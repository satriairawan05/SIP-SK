<?php

namespace App\Http\Controllers\Backend;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    /**
     * Constructor for ProdiController.
     */
    public function __construct(public $name = 'Program Studi')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting.prodi.index', [
            'name' => $this->name,
            'prodi' => Prodi::leftJoin('jurusans', 'prodis.jurusan_id', '=', 'jurusans.jurusan_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.prodi.create', [
            'name' => $this->name,
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'prodi_name' => ['required', 'string'],
            'prodi_alias' => ['required', 'string'],
            'jurusan_id' => ['required']
        ]);

        if (!$validated->fails()) {
            Prodi::create([
                'prodi_name' => $request->input('name'),
                'prodi_alias' => $request->input('alias'),
                'jurusan_id' => $request->input('jurusan_id'),
                'prodi_code' => $request->input('code') ? $request->input('code') : null,
            ]);

            return redirect('prodi')->with('success', 'Added Prodi Successfully');
        } else {
            return redirect('dashboard')->with('failed', 'You not have authority');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        return view('backend.setting.prodi.edit', [
            'name' => $this->name,
            'prodi' => $prodi,
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validated = Validator::make($request->all(), [
            'prodi_name' => ['required', 'string'],
            'prodi_alias' => ['required', 'string'],
            'jurusan_id' => ['required']
        ]);

        if (!$validated->fails()) {
            Prodi::where('prodi_id', $prodi->prodi_id)->update([
                'prodi_name' => $request->input('name'),
                'prodi_alias' => $request->input('alias'),
                'jurusan_id' => $request->input('jurusan_id'),
                'prodi_code' => $request->input('code') ? $request->input('code') : null,
            ]);

            return redirect('prodi')->with('success', 'Updated Prodi Successfully');
        } else {
            return redirect('dashboard')->with('failed', 'You not have authority');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
