<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Constructor for ArchiveController.
     */
    public function __construct(public $name = 'Archive')
    {
        //
    }

    /**
     * Handle the data to View
     */
    public function __invoke(Request $request)
    {
        try {
            if (!$request->js_id) {
                return view('mahasiswa.archive.index', [
                    'name' => $this->name,
                    'surat' => \App\Models\JenisSurat::all()
                ]);
            } else {
                if ($request->js_id == 1) {
                    return view('mahasiswa.archive.index2', [
                        'name' => $this->name,
                        'surat' => \App\Models\JenisSurat::where('js_id',$request->js_id)->first(),
                        'organisasi' => \App\Models\SuratKeputusanOrganisasi::whereNotNull('sko_no_surat')->get()
                    ]);
                } else {
                    return view('mahasiswa.archive.index2', [
                        'name' => $this->name,
                        'surat' => \App\Models\JenisSurat::where('js_id',$request->js_id)->first(),
                        'kegiatan' => \App\Models\SuratKeputusanKegiatan::whereNotNull('skk_no_surat')->get()
                    ]);
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
