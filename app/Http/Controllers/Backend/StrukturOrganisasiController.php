<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StrukturOrganisasiController extends Controller
{
    /**
     * Constructor for StrukturOrganisasiController.
     */
    public function __construct(public $name = 'Struktur Organisasi')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.organisasi.struktur.index',[
            'name' => $this->name,
            'organisasi' => StrukturOrganisasi::leftJoin('organisasis','struktur_organisasis.organisasi_id','=','organisasis.organisasi_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.organisasi.struktur.create',[
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
            'so_nama' => ['required', 'string'],
            'so_jabatan' => ['required', 'string'],
            'organisasi_id' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            StrukturOrganisasi::create([
                'so_nama' => $request->input('so_nama'),
                'so_jabatan' => $request->input('so_jabatan'),
                'organisasi_id' => $request->input('organisasi_id'),
            ]);

            return redirect()->to(route('struktur_organisasi.index'))->with('success', 'Added Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('backend.organisasi.struktur.edit',[
            'name' => $this->name,
            'organisasi' => \App\Models\Organisasi::all(),
            'struktur' => $strukturOrganisasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $validated = Validator::make($request->all(), [
            'so_nama' => ['required', 'string'],
            'so_jabatan' => ['required', 'string'],
            'organisasi_id' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            StrukturOrganisasi::where('so_id', $strukturOrganisasi->so_id)->update([
                'so_nama' => $request->input('so_nama'),
                'so_jabatan' => $request->input('so_jabatan'),
                'organisasi_id' => $request->input('organisasi_id'),
            ]);

            return redirect()->to(route('struktur_organisasi.index'))->with('success', 'Updated Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        StrukturOrganisasi::destroy($strukturOrganisasi->id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
