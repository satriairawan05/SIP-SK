<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Constructor for LoginController.
     */
    public function __construct(public $validated = null, public $name = "")
    {
        $this->middleware('guest')->except('logoutUser');
        $this->middleware('guest')->except('logoutMahasiswa');
    }

    /**
     * Display a listing for User of the resource.
     */
    public function showLoginUserForm()
    {
        $this->name = 'Admin Login';
        return view('auth.admin.login', [
            'name' => $this->name
        ]);
    }

    /**
     * Display a listing for User of the resource.
     */
    public function showChangePasswordUserForm(\App\Models\User $user)
    {
        return view('backend.profile.admin.changepassword',[
            'name' => 'Change Password',
            'user' => $user
        ]);
    }

    /**
     * Process change password for User.
     */
    public function ChangePasswordUser(Request $request, \App\Models\User $user)
    {
        $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'password' => ['required', 'string', 'confirmed']
        ]);

        if(!$validated->fails()){
            \App\Models\User::where('id',$user->id)->update([
                'password' => bcrypt($request->input('password'))
            ]);

            return redirect()->back()->with('success', 'Updated Password Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Process login for User.
     */
    public function loginUser(Request $request)
    {
        $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email'   => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (!$validated->fails()) {
            $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
            if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('user.login')->with('loginError', 'Email atau Password salah');
        } else {
            return redirect()->route('user.login')->with('loginError', $validated->getMessageBag());
        }
    }

    /**
     * Process logout for User.
     */
    public function logoutUser(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::guard('admin')->check()) {
            \Illuminate\Support\Facades\Auth::guard('admin')->logout();
            return redirect()->route('user.login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('home-page');
    }

    /**
     * Display a listing for User of the resource.
     */
    public function showLoginMahasiswaForm()
    {
        $this->name = 'Mahasiswa Login';
        return view('auth.mahasiswa.login', [
            'name' => $this->name
        ]);
    }

    /**
     * Display a listing for Mahasiswa of the resource.
     */
    public function showChangePasswordMahasiswaForm(\App\Models\Mahasiswa $mahasiswa)
    {
        return view('backend.profile.mahasiswa.changepassword',[
            'name' => 'Change Password',
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Process change password for Mahasiswa.
     */
    public function ChangePasswordMahasiswa(Request $request, \App\Models\Mahasiswa $mahasiswa)
    {
        $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'password' => ['required', 'string', 'confirmed']
        ]);

        if(!$validated->fails()){
            \App\Models\Mahasiswa::where('mhs_id',$mahasiswa->mhs_id)->update([
                'password' => bcrypt($request->input('password'))
            ]);

            return redirect()->back()->with('success', 'Updated Password Successfully!');

        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Process login for User.
     */
    public function loginMahasiswa(Request $request)
    {
        // dd($request->all());
        $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'mhs_nim'   => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (!$validated->fails()) {
            $credentials = ['mhs_nim' => $request->input('mhs_nim'), 'password' => $request->input('password')];
            if (\Illuminate\Support\Facades\Auth::guard('mahasiswa')->attempt($credentials)) {
                return redirect()->intended('/home');
            }
            return redirect()->route('mahasiswa.login')->with('loginError', 'NIM atau Password salah');
        } else {
            return redirect()->route('mahasiswa.login')->with('loginError', $validated->getMessageBag());
        }
    }

    /**
     * Process logout for Mahasiswa.
     */
    public function logoutMahasiswa(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::guard('mahasiswa')->check()) {
            \Illuminate\Support\Facades\Auth::guard('mahasiswa')->logout();
            return redirect()->route('mahasiswa.login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('home-page');
    }
}
