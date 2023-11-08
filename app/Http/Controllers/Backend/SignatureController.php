<?php

namespace App\Http\Controllers\Backend;

use App\Models\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SignatureController extends Controller
{
    /**
     * Constructor for SignatureController.
     */
    public function __construct(public $name = 'Signature')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->input('js_id')) {
            return view('backend.setting.signature.index', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::all()
            ]);
        } else {
            return view('backend.setting.signature.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', request()->input('js_id'))->first(),
                'signature' => Signature::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'sign_nama' => ['required', 'string'],
            'sign_nip' => ['required', 'string'],
            'sign_jabatan' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            $surat = \App\Models\JenisSurat::where('js_jenis', $request->js_jenis)->first();

            Signature::create([
                'js_id' => $surat->js_id,
                'sign_nama' => $request->input('sign_nama'),
                'sign_nip' => $request->input('sign_nip'),
                'sign_jabatan' => $request->input('sign_jabatan'),
            ]);

            return redirect()->back()->with('success', 'Added Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Signature $signature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signature $signature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Signature $signature)
    {
        $validated = Validator::make($request->all(), [
            'sign_nama' => ['required', 'string'],
            'sign_nip' => ['required', 'string'],
            'sign_jabatan' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            $surat = \App\Models\JenisSurat::where('js_jenis', $request->js_jenis)->first();

            Signature::where('sign_id',$signature->sign_id)->update([
                'js_id' => $surat->js_id,
                'sign_nama' => $request->input('sign_nama'),
                'sign_nip' => $request->input('sign_nip'),
                'sign_jabatan' => $request->input('sign_jabatan'),
            ]);

            return redirect()->back()->with('success', 'Added Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signature $signature)
    {
        Signature::destroy($signature->sign_id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
