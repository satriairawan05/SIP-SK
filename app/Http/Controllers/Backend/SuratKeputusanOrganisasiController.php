<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeputusanOrganisasi;
use Illuminate\Support\Facades\Validator;

class SuratKeputusanOrganisasiController extends Controller
{
    /**
     * Constructor for SuratKeputusanOrganisasiController.
     */
    public function __construct(public $name = 'Surat Keputusan Organisasi')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.surat_organisasi.index', [
            'name' => $this->name,
            'organisasi' => SuratKeputusanOrganisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.surat_organisasi.create', [
            'name' => $this->name,
            'organisasi' => \App\Models\Organisasi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'sko_subject' => ['required', 'string'],
            'sko_tgl_surat' => ['required', 'date'],
            'sko_menimbang' => ['required', 'string'],
            'sko_mengingat' => ['required', 'string'],
            'sko_memperhatikan' => ['required', 'string'],
            'sko_menetapkan' => ['required', 'string'],
            'sko_kesatu' => ['required', 'string'],
            'sko_kedua' => ['required', 'string'],
            'sko_ketiga' => ['required', 'string'],
            'sko_keempat' => ['required', 'string'],
            'sko_kelima' => ['required', 'string'],
            'sko_tembusan' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            $jenisSurat = \App\Models\JenisSurat::where('js_jenis', $this->name)->first();
            SuratKeputusanOrganisasi::create([
                'sko_subject' => $request->input('sko_subject'),
                'sko_tgl_surat' => $request->input('sko_tgl_surat'),
                'sko_menimbang' => $request->input('sko_menimbang'),
                'sko_mengingat' => $request->input('sko_mengingat'),
                'sko_memperhatikan' => $request->input('sko_memperhatikan'),
                'sko_menetapkan' => $request->input('sko_menetapkan'),
                'sko_kesatu' => $request->input('sko_kesatu'),
                'sko_kedua' => $request->input('sko_kedua'),
                'sko_ketiga' => $request->input('sko_ketiga'),
                'sko_keempat' => $request->input('sko_keempat'),
                'sko_kelima' => $request->input('sko_kelima'),
                'sko_tembusan' => $request->input('sko_tembusan'),
                'sko_uuid' => \Illuminate\Support\Str::uuid()->toString(),
                'sko_created' => auth()->guard('admin')->user()->name ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name,
                'js_id' => $jenisSurat->js_id,
                'organisasi_id' => $request->input('organisasi_id')
            ]);

            return redirect()->to(route('sko.index'))->with('success', 'Added Successfully!');
        } else {
            return redirect()->to(route('sko.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        return view('backend.surat_organisasi.document', [
            'keputusan' => $suratKeputusanOrganisasi->find(request()->segment(3))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        return view('backend.surat_organisasi.edit', [
            'name' => $this->name,
            'keputusan' => $suratKeputusanOrganisasi->find(request()->segment(3)),
            'organisasi' => \App\Models\Organisasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        $validated = Validator::make($request->all(), [
            'sko_subject' => ['required', 'string'],
            'sko_tgl_surat' => ['required', 'date'],
            'sko_menimbang' => ['required', 'string'],
            'sko_mengingat' => ['required', 'string'],
            'sko_memperhatikan' => ['required', 'string'],
            'sko_menetapkan' => ['required', 'string'],
            'sko_kesatu' => ['required', 'string'],
            'sko_kedua' => ['required', 'string'],
            'sko_ketiga' => ['required', 'string'],
            'sko_keempat' => ['required', 'string'],
            'sko_tembusan' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            SuratKeputusanOrganisasi::where('sko_id', $suratKeputusanOrganisasi->sko_id)->update([
                'sko_subject' => $request->input('sko_subject'),
                'sko_tgl_surat' => $request->input('sko_tgl_surat'),
                'sko_menimbang' => $request->input('sko_menimbang'),
                'sko_mengingat' => $request->input('sko_mengingat'),
                'sko_memperhatikan' => $request->input('sko_memperhatikan'),
                'sko_menetapkan' => $request->input('sko_menetapkan'),
                'sko_kesatu' => $request->input('sko_kesatu'),
                'sko_kedua' => $request->input('sko_kedua'),
                'sko_ketiga' => $request->input('sko_ketiga'),
                'sko_keempat' => $request->input('sko_keempat'),
                'sko_kelima' => $request->input('sko_kelima'),
                'sko_tembusan' => $request->input('sko_tembusan'),
                'sko_updated' => auth()->guard('admin')->user()->name ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name,
                'organisasi_id' => $request->input('organisasi_id')
            ]);

            return redirect()->to(route('sko.index'))->with('success', 'Updated Successfully!');
        } else {
            return redirect()->to(route('sko.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        SuratKeputusanOrganisasi::destroy($suratKeputusanOrganisasi->sko_id);

        return redirect()->to(route('sko.index'))->with('success', 'Deleted Successfully!');
    }
}
