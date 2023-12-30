<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrganisasiController extends Controller
{
    /**
     * Constructor for OrganisasiController.
     */
    public function __construct(public $name = 'Organisasi')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('mahasiswa.organisasi.index', [
                'name' => $this->name,
                'organisasi' => Organisasi::leftJoin('prodis', 'organisasis.prodi_id', '=', 'prodis.prodi_id')->get()
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
            return view('mahasiswa.organisasi.create', [
                'name' => $this->name,
                'prodi' => \App\Models\Prodi::all()
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
                'organisasi_nama' => ['required', 'string'],
                'organisasi_status' => ['required', 'string'],
                'organisasi_periode' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                Organisasi::create([
                    'organisasi_nama' => $request->input('organisasi_nama'),
                    'organisasi_status' => $request->input('organisasi_status'),
                    'organisasi_periode' => $request->input('organisasi_periode'),
                    'organisasi_affiliate' => $request->input('organisasi_affiliate') ? $request->input('organisasi_affiliate') : null,
                    'prodi_id' => $request->input('prodi_id') ? $request->input('prodi_id') : null,
                ]);


                return redirect()->to(route('organisasis.index'))->with('success', 'Added Successfully!');
            } else {
                return redirect()->back()->with('failed', $validated->getMessageBag());
            }
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        try {
            return view('mahasiswa.organisasi.edit', [
                'name' => $this->name,
                'organisasi' => $organisasi,
                'prodi' => \App\Models\Prodi::all()
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        dd($request->all());
        try {
            $validated = Validator::make($request->all(), [
                'organisasi_nama' => ['required', 'string'],
                'organisasi_status' => ['required', 'string'],
                'organisasi_periode' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                Organisasi::where('organisasi_id', $organisasi->organisasi_id)->update([
                    'organisasi_nama' => $request->input('organisasi_nama'),
                    'organisasi_status' => $request->input('organisasi_status'),
                    'organisasi_periode' => $request->input('organisasi_periode'),
                    'organisasi_affiliate' => $request->input('organisasi_affiliate') ? $request->input('organisasi_affiliate') : null,
                    'prodi_id' => $request->input('prodi_id') ? $request->input('prodi_id') : null,
                ]);

                return redirect()->to(route('organisasis.index'))->with('success', 'Updated Successfully!');
            } else {
                return redirect()->back()->with('failed', $validated->getMessageBag());
            }
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        try {
            $data = $organisasi->find(request()->segment(3));
            Organisasi::destroy($data->organisasi_id);

            return redirect()->back()->with('success', 'Deleted Successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}