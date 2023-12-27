<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Constructor for ArchiveController.
     */
    public function __construct(public $name = 'Penyimpanan SK')
    {
        //
    }

    /**
     * viewByJenisSurat
     *
     * @param  mixed $reqJs
     * @return void
     */
    private function viewByJenisSurat($reqJs)
    {
        if ($reqJs == 1) {
            return view('backend.archive.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', $reqJs)->first(),
                'organisasi' => \App\Models\SuratKeputusanOrganisasi::whereNotNull('sko_no_surat')->get()
            ]);
        } else {
            return view('backend.archive.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', $reqJs)->first(),
                'kegiatan' => \App\Models\SuratKeputusanKegiatan::whereNotNull('skk_no_surat')->get()
            ]);
        }
    }

    /**
     * viewByJenisSuratAndYear
     *
     * @param  mixed $reqJs
     * @param  mixed $reqYear
     * @return void
     */
    private function viewByJenisSuratAndYear($reqJs, $reqYear)
    {
        if ($reqJs == 1) {
            return view('backend.archive.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', $reqJs)->first(),
                'organisasi' => \App\Models\SuratKeputusanOrganisasi::whereNotNull('sko_no_surat')->whereYear('created_at', $reqYear)->get()
            ]);
        } else {
            return view('backend.archive.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', $reqJs)->first(),
                'kegiatan' => \App\Models\SuratKeputusanKegiatan::whereNotNull('skk_no_surat')->whereYear('created_at', $reqYear)->get()
            ]);
        }
    }

    /**
     * Handle the data to View
     */
    public function __invoke(Request $request)
    {
        try {
            if (!$request->js_id) {
                return view('backend.archive.index', [
                    'name' => $this->name,
                    'surat' => \App\Models\JenisSurat::all()
                ]);
                if (!$request->js_id || !$request->year) {
                    return view('backend.archive.index', [
                        'name' => $this->name,
                        'surat' => \App\Models\JenisSurat::all()
                    ]);
                }
            } else {
                if ($request->js_id == 1) {
                    return $this->viewByJenisSurat($request->js_id);
                    if ($request->js_id == 1 && $request->year) {
                        return $this->viewByJenisSuratAndYear($request->js_id, $request->year);
                    }
                } else {
                    return $this->viewByJenisSurat($request->js_id);
                    if ($request->js_id == 2 && $request->year) {
                        return $this->viewByJenisSuratAndYear($request->js_id, $request->year);
                    }
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
