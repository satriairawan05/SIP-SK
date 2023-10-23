<?php

namespace App\Http\Controllers\Backend;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Constructor for JurusanController.
     */
    public function __construct(public $name = 'Jurusan')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting.jurusan.index', [
            'name' => $this->name,
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.jurusan.create', [
            'name' => $this->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'jurusan_name' => ['required', 'string'],
            'jurusan_alias' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            Jurusan::create([
                'jurusan_name' => $request->input('name'),
                'jurusan_alias' => $request->input('alias'),
                'jurusan_code' => $request->input('code') ? $request->input('code') : null,
            ]);

            return redirect('jurusan')->with('success', 'Added Jurusan Successfully');
        } else {
            return redirect('dashboard')->with('failed', 'You not have authority');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('backend.setting.jurusan.edit', [
            'name' => $this->name,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = Validator::make($request->all(), [
            'jurusan_name' => ['required', 'string'],
            'jurusan_alias' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            Jurusan::where('jurusan_id', $jurusan->jurusan_id)->udate([
                'jurusan_name' => $request->input('name'),
                'jurusan_alias' => $request->input('alias'),
                'jurusan_code' => $request->input('code') ? $request->input('code') : null,
            ]);

            return redirect('jurusan')->with('success', 'Updated Jurusan Successfully');
        } else {
            return redirect('dashboard')->with('failed', 'You not have authority');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->jurusan_id);

        return redirect('jurusan')->with('success', 'Deleted Jurusan Successfully');
    }
}