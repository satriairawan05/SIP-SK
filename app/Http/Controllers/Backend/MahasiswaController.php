<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Constructor for UserController.
     */
    public function __construct(public $name = 'Mahasiswa')
    {
        //
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $mahasiswa = Mahasiswa::where('mhs_id', auth()->guard('mahasiswa')->user()->mhs_id)->latest()->get();

            return view('backend.setting.mahasiswa.index', [
                'name' => $this->name,
                'mahasiswas' => $mahasiswa,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $jurusan = \App\Models\Jurusan::all();
            $prodi = \App\Models\Prodi::all();
            $jenisKelamin = ['Laki-Laki', 'Perempuan'];
            $semester = [1, 2, 3, 4, 5, 6, 7, 8];

            return view('backend.setting.mahasiswa.create', [
                'name' => $this->name,
                'jurusan' => $jurusan,
                'prodi' => $prodi,
                'jenisKelamin' => $jenisKelamin,
                'semester' => $semester
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'mhs_nama' => ['required', 'string'],
                'mhs_nim' => ['required', 'string', 'unique:mahasiswas,mhs_nim'],
                'mhs_jurusan' => ['required', 'string'],
                'mhs_prodi' => ['required', 'string'],
                'mhs_semester' => ['required', 'string'],
                'mhs_jk' => ['required', 'string'],
                'mhs_no_hp' => ['required', 'string'],
                'mhs_alamat' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                $prodi = \App\Models\Prodi::where('prodi_name', $request->input('mhs_prodi'))->first();
                $jenjang = $prodi->prodi_jenjang;

                Mahasiswa::create([
                    'mhs_nama' => $request->input('mhs_nama'),
                    'mhs_nim' => $request->input('mhs_nim'),
                    'mhs_jurusan' => $request->input('mhs_jurusan'),
                    'mhs_prodi' => $request->input('mhs_prodi'),
                    'mhs_semester' => $request->input('mhs_semester'),
                    'mhs_jk' => $request->input('mhs_jk'),
                    'mhs_no_hp' => $request->input('mhs_no_hp'),
                    'mhs_alamat' => $request->input('mhs_alamat'),
                    'mhs_tahun_masuk' => $request->input('mhs_tahun_masuk'),
                    'mhs_jenjang' => $jenjang,
                    'password' => bcrypt($request->input('mhs_nim')),
                ]);

                return redirect()->to(route('mahasiswa.index'))->with('success', 'Added Successfully!');
            } else {
                return redirect()->back()->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        try {
            $jurusan = \App\Models\Jurusan::all();
            $prodi = \App\Models\Prodi::all();
            $jenisKelamin = ['Laki-Laki', 'Perempuan'];
            $semester = [1, 2, 3, 4, 5, 6, 7, 8];

            return view('backend.setting.mahasiswa.edit', [
                'name' => $this->name,
                'jurusan' => $jurusan,
                'prodi' => $prodi,
                'jenisKelamin' => $jenisKelamin,
                'semester' => $semester,
                'mhs' => $mahasiswa
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        try {
            $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'mhs_nama' => ['required', 'string'],
                'mhs_nim' => ['required', 'string'],
                'mhs_jurusan' => ['required', 'string'],
                'mhs_prodi' => ['required', 'string'],
                'mhs_semester' => ['required', 'string'],
                'mhs_jk' => ['required', 'string'],
                'mhs_no_hp' => ['required', 'string'],
                'mhs_alamat' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                $prodi = \App\Models\Prodi::where('prodi_name', $request->input('mhs_prodi'))->first();
                $jenjang = $prodi->prodi_jenjang;

                Mahasiswa::where('mhs_id', $mahasiswa->mhs_id)->update([
                    'mhs_nama' => $request->input('mhs_nama'),
                    'mhs_nim' => $request->input('mhs_nim'),
                    'mhs_jurusan' => $request->input('mhs_jurusan'),
                    'mhs_prodi' => $request->input('mhs_prodi'),
                    'mhs_semester' => $request->input('mhs_semester'),
                    'mhs_jk' => $request->input('mhs_jk'),
                    'mhs_no_hp' => $request->input('mhs_no_hp'),
                    'mhs_alamat' => $request->input('mhs_alamat'),
                    'mhs_tahun_masuk' => $request->input('mhs_tahun_masuk'),
                    'mhs_jenjang' => $jenjang,
                    'password' => bcrypt($request->input('mhs_nim')),
                ]);

                return redirect()->to(route('mahasiswa.index'))->with('success', 'Udated Successfully!');
            } else {
                return redirect()->back()->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try {
            $data = $mahasiswa->find(request()->segment(3));
            Mahasiswa::destroy($data->mhs_id);

            return redirect()->back()->with('success', 'Deleted Successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
