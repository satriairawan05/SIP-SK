<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeputusanKegiatan;
use Illuminate\Support\Facades\Validator;

class SuratKeputusanKegiatanController extends Controller
{
    /**
     * Constructor for SuratKeputusanController.
     */
    public function __construct(public $name = 'Surat Keputusan Kegiatan')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('mahasiswa.surat_kegiatan.index', [
                'name' => $this->name,
                'kegiatan' => SuratKeputusanKegiatan::all()
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('mahasiswa.surat_kegiatan.create', [
                'name' => $this->name
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'skk_subject' => ['required', 'string'],
                'skk_tgl_surat' => ['required', 'date'],
                'skk_menimbang' => ['required', 'string'],
                'skk_mengingat' => ['required', 'string'],
                'skk_memperhatikan' => ['required', 'string'],
                'skk_menetapkan' => ['required', 'string'],
                'skk_kesatu' => ['required', 'string'],
                'skk_kedua' => ['required', 'string'],
                'skk_ketiga' => ['required', 'string'],
                'skk_keempat' => ['required', 'string'],
                'skk_tembusan' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                $jenisSurat = \App\Models\JenisSurat::where('js_jenis',$this->name)->first();
                SuratKeputusanKegiatan::create([
                    'skk_subject' => $request->input('skk_subject'),
                    'skk_tgl_surat' => $request->input('skk_tgl_surat'),
                    'skk_menimbang' => $request->input('skk_menimbang'),
                    'skk_mengingat' => $request->input('skk_mengingat'),
                    'skk_memperhatikan' => $request->input('skk_memperhatikan'),
                    'skk_menetapkan' => $request->input('skk_menetapkan'),
                    'skk_kesatu' => $request->input('skk_kesatu'),
                    'skk_kedua' => $request->input('skk_kedua'),
                    'skk_ketiga' => $request->input('skk_ketiga'),
                    'skk_keempat' => $request->input('skk_keempat'),
                    'skk_tembusan' => $request->input('skk_tembusan'),
                    'skk_uuid' => \Illuminate\Support\Str::uuid()->toString(),
                    'skk_created' => auth()->guard('admin')->user()->name ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name,
                    'js_id' => $jenisSurat->js_id
                ]);

                return redirect()->to(route('skk.index'))->with('success', 'Added Successfully!');
            } else {
                return redirect()->to(route('skk.index'))->with('failed', $validated->getMessageBag());
            }
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        try {
            $surat = $suratKeputusanKegiatan->find(request()->segment(3));
            return view('mahasiswa.surat_kegiatan.document',[
                'keputusan' => $suratKeputusanKegiatan->find(request()->segment(3)),
                'signature' => \App\Models\Signature::leftJoin('jenis_surats','signatures.js_id', '=', 'jenis_surats.js_id')->where('signatures.js_id','=', $surat->js_id)->first()
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        try {
            return view('mahasiswa.surat_kegiatan.edit', [
                'name' => $this->name,
                'keputusan' => $suratKeputusanKegiatan->find(request()->segment(3)),
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        try {
            $validated = Validator::make($request->all(), [
                'skk_subject' => ['required', 'string'],
                'skk_tgl_surat' => ['required', 'date'],
                'skk_menimbang' => ['required', 'string'],
                'skk_mengingat' => ['required', 'string'],
                'skk_memperhatikan' => ['required', 'string'],
                'skk_menetapkan' => ['required', 'string'],
                'skk_kesatu' => ['required', 'string'],
                'skk_kedua' => ['required', 'string'],
                'skk_ketiga' => ['required', 'string'],
                'skk_keempat' => ['required', 'string'],
                'skk_tembusan' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                SuratKeputusanKegiatan::where('skk_id', $suratKeputusanKegiatan->skk_id)->update([
                    'skk_subject' => $request->input('skk_subject'),
                    'skk_tgl_surat' => $request->input('skk_tgl_surat'),
                    'skk_menimbang' => $request->input('skk_menimbang'),
                    'skk_mengingat' => $request->input('skk_mengingat'),
                    'skk_memperhatikan' => $request->input('skk_memperhatikan'),
                    'skk_menetapkan' => $request->input('skk_menetapkan'),
                    'skk_kesatu' => $request->input('skk_kesatu'),
                    'skk_kedua' => $request->input('skk_kedua'),
                    'skk_ketiga' => $request->input('skk_ketiga'),
                    'skk_keempat' => $request->input('skk_keempat'),
                    'skk_tembusan' => $request->input('skk_tembusan'),
                    'skk_updated' => auth()->guard('admin')->user()->name ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name
                ]);

                return redirect()->to(route('skk.index'))->with('success', 'Updated Successfully!');
            } else {
                return redirect()->to(route('skk.index'))->with('failed', $validated->getMessageBag());
            }
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        try {
            SuratKeputusanKegiatan::destroy($suratKeputusanKegiatan->skk_id);

            return redirect()->to(route('skk.index'))->with('success', 'Deleted Successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
