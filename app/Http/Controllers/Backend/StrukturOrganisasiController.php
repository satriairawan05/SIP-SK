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
        try {
            return view('backend.organisasi.struktur.index', [
                'name' => $this->name,
                'organisasi' => StrukturOrganisasi::leftJoin('organisasis', 'struktur_organisasis.organisasi_id', '=', 'organisasis.organisasi_id')->latest('sturktur_organisasis.created_at')->get()
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
            return view('backend.organisasi.struktur.create', [
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
                'so_nama' => ['required', 'string'],
                'so_jabatan' => ['required', 'string'],
                'organisasi_id' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                StrukturOrganisasi::create([
                    'so_nama' => $request->input('so_nama'),
                    'so_jabatan' => $request->input('so_jabatan'),
                    'so_departemen' => $request->input('so_departemen'),
                    'organisasi_id' => $request->input('organisasi_id'),
                ]);

                return redirect()->to(route('struktur_organisasi.index'))->with('success', 'Added Successfully!');
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
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        try {
            return view('backend.organisasi.struktur.edit', [
                'name' => $this->name,
                'organisasi' => \App\Models\Organisasi::all(),
                'struktur' => $strukturOrganisasi
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        try {
            $validated = Validator::make($request->all(), [
                'so_nama' => ['required', 'string'],
                'so_jabatan' => ['required', 'string'],
                'organisasi_id' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                StrukturOrganisasi::where('so_id', $strukturOrganisasi->so_id)->update([
                    'so_nama' => $request->input('so_nama'),
                    'so_jabatan' => $request->input('so_jabatan'),
                    'so_departemen' => $request->input('so_departemen'),
                    'organisasi_id' => $request->input('organisasi_id'),
                ]);

                return redirect()->to(route('struktur_organisasi.index'))->with('success', 'Updated Successfully!');
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
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        try {
            $data = $strukturOrganisasi->find(request()->segment(3));
            StrukturOrganisasi::destroy($data->so_id);

            return redirect()->back()->with('success', 'Deleted Successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
