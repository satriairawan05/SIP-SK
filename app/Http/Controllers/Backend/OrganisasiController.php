<?php

namespace App\Http\Controllers\Backend;

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
        return view('backend.organisasi.index', [
            'name' => $this->name,
            'organisasi' => Organisasi::leftJoin('prodis', 'organisasis.prodi_id', '=', 'prodis.prodi_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.organisasi.create', [
            'name' => $this->name,
            'prodi' => \App\Models\Prodi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());

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


            return redirect()->to(route('organisasi.index'))->with('success', 'Added Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
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
        return view('backend.organisasi.edit', [
            'name' => $this->name,
            'organisasi' => $organisasi,
            'prodi' => \App\Models\Prodi::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
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

            return redirect()->to(route('organisasi.index'))->with('success', 'Updated Successfully!');
        } else {
            return redirect()->back()->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        Organisasi::destroy($organisasi->id);

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
