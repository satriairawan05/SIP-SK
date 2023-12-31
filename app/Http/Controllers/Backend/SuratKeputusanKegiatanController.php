<?php

namespace App\Http\Controllers\Backend;

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
            return view('backend.surat_kegiatan.index', [
                'name' => $this->name,
                'kegiatan' => SuratKeputusanKegiatan::latest()->get(),
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
            return view('backend.surat_kegiatan.create', [
                'name' => $this->name
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
                $jenisSurat = \App\Models\JenisSurat::where('js_jenis', $this->name)->first();
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
                    'skk_created' =>auth()->guard('admin')->user()->name,
                    'js_id' => $jenisSurat->js_id,
                    'skk_approved_step' => 1
                ]);

                return redirect()->to(route('skk.index'))->with('success', 'Added Successfully!');
            } else {
                return redirect()->to(route('skk.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
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

            SuratKeputusanKegiatan::where('skk_id', $surat->skk_id)->update([
                'skk_last_print' => \Carbon\Carbon::now()
            ]);

            return view('backend.surat_kegiatan.document', [
                'keputusan' => $surat,
                'signature' => \App\Models\Signature::leftJoin('jenis_surats', 'signatures.js_id', '=', 'jenis_surats.js_id')->where('signatures.js_id', '=', $surat->js_id)->first()
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        if ($suratKeputusanKegiatan->skk_no_surat == null || $suratKeputusanKegiatan->skk_no_surat_old == null) {
            try {
                return view('backend.surat_kegiatan.edit', [
                    'name' => $this->name,
                    'keputusan' => $suratKeputusanKegiatan->find(request()->segment(3))
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Auhtority');
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
                    'skk_updated' => auth()->guard('admin')->user()->name,
                    'skk_approved_step' => 1
                ]);

                return redirect()->to(route('skk.index'))->with('success', 'Updated Successfully!');
            } else {
                return redirect()->to(route('skk.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified approval in resource storage.
     */
    public function updateApproval(Request $request, SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        if (\App\Models\Approval::where('user_id', auth()->guard('admin')->user()->id)->first() == auth()->guard('admin')->user()->id && $suratKeputusanKegiatan->skk_approved_step == \App\Models\Approval::where('app_ordinal', $suratKeputusanKegiatan->skk_approved_step)->whereNull('app_status')->first()) {
            try {
                SuratKeputusanKegiatan::where('skk_id', $suratKeputusanKegiatan->skk_id)->update([
                    'skk_remark' => $request->input('skk_remark'),
                    'skk_disposisi' => $request->input('skk_disposisi'),
                    'skk_approved' => auth()->guard('admin')->user()->name
                ]);

                $latestApproval = \App\Models\Approval::where('skk_id', $suratKeputusanKegiatan->skk_id)->latest('app_ordinal')->first();
                if ($request->skk_disposisi == 'Accepted') {
                    if ($latestApproval->app_ordinal == $suratKeputusanKegiatan->skk_approved_step) {
                        $stepData = $suratKeputusanKegiatan->skk_approved_step;

                        $surat = \App\Models\JenisSurat::where('js_id', $suratKeputusanKegiatan->js_id)->first();
                        $code = $surat->js_code;
                        $ordinal = $surat->js_ordinal;

                        $this->generateNomor($suratKeputusanKegiatan->sko_id, $ordinal, $code,  $suratKeputusanKegiatan->created_at);
                    } else {
                        $stepData = $suratKeputusanKegiatan->skk_approved_step + 1;
                    }

                    SuratKeputusanKegiatan::where('skk_id', $suratKeputusanKegiatan->skk_id)->update([
                        'sko_approved_step' => $stepData
                    ]);
                } else {
                    SuratKeputusanKegiatan::where('skk_id', $suratKeputusanKegiatan->skk_id)->update([
                        'sko_approved_step' => 1
                    ]);
                }

                \App\Models\Approval::where('js_id', $suratKeputusanKegiatan->js_id)->update([
                    'app_status' => $request->input('skk_disposisi'),
                    'app_date' => \Carbon\Carbon::now()
                ]);

                return redirect()->back()->with('success', 'Data ' . $suratKeputusanKegiatan->skk_subject . ' telah di perbaru');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    public function generateNomor(string $idSurat, string $ordinal, string $code, string $reqTgl)
    {
        $tgl_surat = explode('-', $reqTgl);
        $year = $tgl_surat[0];

        $surat = SuratKeputusanKegiatan::findOrfail($idSurat);
        $lastCount = $surat->js_ordinal;
        $count = $lastCount + 1;

        if ($ordinal == 0) {
            \App\Models\JenisSurat::where('js_id', $surat->js_id)->update(['js_ordinal' => $count]);
        } else {
            if ($ordinal >= 100) {
                \App\Models\JenisSurat::where('js_id', $surat->js_id)->update(['js_ordinal' => 0]);
            }
            $plusOrdinal = $surat->js_ordinal + 1;
            \App\Models\JenisSurat::where('js_id', $surat->js_id)->update(['js_ordinal' => $plusOrdinal]);
        }

        $nomor_surat = \App\Helper\Helper::generateNumber($code, $ordinal, $year);

        return SuratKeputusanKegiatan::where('sko_id', $idSurat)->update(['sko_no_surat' => $nomor_surat, 'sko_nomor_surat_old' => $nomor_surat]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeputusanKegiatan $suratKeputusanKegiatan)
    {
        if ($suratKeputusanKegiatan->skk_no_surat == null || $suratKeputusanKegiatan->skk_no_surat_old == null) {
            try {
                $data = $suratKeputusanKegiatan->find(request()->segment(3));
                SuratKeputusanKegiatan::destroy($data->skk_id);

                return redirect()->to(route('skk.index'))->with('success', 'Deleted Successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
