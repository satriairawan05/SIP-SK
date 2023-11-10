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
        try {
            return view('backend.surat_organisasi.index', [
                'name' => $this->name,
                'organisasi' => SuratKeputusanOrganisasi::all()
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
            return view('backend.surat_organisasi.create', [
                'name' => $this->name,
                'organisasi' => \App\Models\Organisasi::all()
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
                    'sko_created' => auth()->guard('admin')->check() ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name,
                    'js_id' => $jenisSurat->js_id,
                    'organisasi_id' => $request->input('organisasi_id'),
                    'sko_approved_step' => 1
                ]);

                return redirect()->to(route('sko.index'))->with('success', 'Added Successfully!');
            } else {
                return redirect()->to(route('sko.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        try {
            $surat = $suratKeputusanOrganisasi->find(request()->segment(3));

            SuratKeputusanOrganisasi::where('sko_id', $surat->sko_id)->update([
                'sko_last_print' => \Carbon\Carbon::now()
            ]);

            return view('backend.surat_organisasi.document', [
                'keputusan' => $surat,
                'signature' => \App\Models\Signature::leftJoin('jenis_surats', 'signatures.js_id', '=', 'jenis_surats.js_id')->where('signatures.js_id', '=', $surat->js_id)->first(),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        if ($suratKeputusanOrganisasi->sko_no_surat == null || $suratKeputusanOrganisasi->sko_no_surat_old == null) {
            try {
                return view('backend.surat_organisasi.edit', [
                    'name' => $this->name,
                    'keputusan' => $suratKeputusanOrganisasi->find(request()->segment(3)),
                    'organisasi' => \App\Models\Organisasi::all()
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        try {
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
                    'sko_updated' => auth()->guard('admin')->check() ? auth()->guard('admin')->user()->name : auth()->guard('mahasiswa')->user()->name,
                    'organisasi_id' => $request->input('organisasi_id'),
                    'sko_approved_step' => 1
                ]);

                return redirect()->to(route('sko.index'))->with('success', 'Updated Successfully!');
            } else {
                return redirect()->to(route('sko.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified approval in resource storage.
     */
    public function updateApproval(Request $request, SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        if (\App\Models\Approval::where('user_id', auth()->guard('admin')->user()->id)->first() == auth()->guard('admin')->user()->id && $suratKeputusanOrganisasi->sko_approved_step == \App\Models\Approval::where('app_ordinal', $suratKeputusanOrganisasi->sko_approved_step)->whereNull('app_status')->first()) {
            try {
                SuratKeputusanOrganisasi::where('skk_id', $suratKeputusanOrganisasi->sko_id)->update([
                    'sko_remark' => $request->input('sko_remark'),
                    'sko_disposisi' => $request->input('sko_disposisi'),
                    'sko_approved' => auth()->guard('admin')->user()->name
                ]);

                \App\Models\Approval::where('js_id', $suratKeputusanOrganisasi->js_id)->update([
                    'app_status' => $request->input('skk_disposisi'),
                    'app_date' => \Carbon\Carbon::now()
                ]);

                return redirect()->back()->with('success', 'Data ' . $suratKeputusanOrganisasi->sko_subject . ' telah di perbaru');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeputusanOrganisasi $suratKeputusanOrganisasi)
    {
        if ($suratKeputusanOrganisasi->sko_no_surat == null || $suratKeputusanOrganisasi->sko_no_surat_old == null) {
            try {
                SuratKeputusanOrganisasi::destroy($suratKeputusanOrganisasi->sko_id);
                return redirect()->to(route('sko.index'))->with('success', 'Deleted Successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority');
        }
    }
}
