<?php

namespace App\Http\Controllers\Backend;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JenisSuratController extends Controller
{
    /**
     * Constructor for JenisSuratController.
     */
    public function __construct(public $name = 'Jenis Surat')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting.jenis_surat.index',[
            'name' => $this->name,
            'surat' => JenisSurat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.jenis_surat.create',[
            'name' => $this->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'js_jenis' => ['required', 'string'],
            'js_kode' => ['required', 'string'],
            'js_nomor' => ['required', 'string'],
        ]);

        if(!$validated->fails()){
            JenisSurat::create([
                'js_jenis' => $request->input('js_jenis'),
                'js_kode' => $request->input('js_kode'),
                'js_nomor' => $request->input('js_nomor'),
                'js_ordinal' => 0
            ]);

            return redirect()->to(route('jenis_surat.index'))->with('success', 'Added Successfully');
        } else {
            return redirect()->to(route('jenis_surat.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        return view('backend.setting.jenis_surat.edit',[
            'name' => $this->name,
            'surat' => $jenisSurat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSurat $jenisSurat)
    {
        $validated = Validator::make($request->all(), [
            'js_jenis' => ['required', 'string'],
            'js_kode' => ['required', 'string'],
            'js_nomor' => ['required', 'string'],
        ]);

        if(!$validated->fails()){
            JenisSurat::where('js_id',$jenisSurat->js_id)->update([
                'js_jenis' => $request->input('js_jenis'),
                'js_kode' => $request->input('js_kode'),
                'js_nomor' => $request->input('js_nomor')
            ]);

            return redirect()->to(route('jenis_surat.index'))->with('success', 'Updated Successfully');
        } else {
            return redirect()->to(route('jenis_surat.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        JenisSurat::destroy($jenisSurat->js_id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
