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
        try {
            return view('backend.setting.jurusan.index', [
                'name' => $this->name,
                'jurusan' => Jurusan::latest()->get(),
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
            return view('backend.setting.jurusan.create', [
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
        // dd($request->all());
        try {
            $validated = Validator::make($request->all(), [
                'jurusan_nama' => ['required', 'string'],
                'jurusan_alias' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                Jurusan::create([
                    'jurusan_nama' => $request->input('jurusan_nama'),
                    'jurusan_alias' => $request->input('jurusan_alias'),
                    'jurusan_code' => $request->input('jurusan_code') ? $request->input('jurusan_code') : null,
                ]);

                return redirect()->to(route('jurusan.index'))->with('success', 'Added Successfully');
            } else {
                return redirect()->to(route('jurusan.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
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
        try {
            return view('backend.setting.jurusan.edit', [
                'name' => $this->name,
                'jurusan' => $jurusan
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        try {
            $validated = Validator::make($request->all(), [
                'jurusan_nama' => ['required', 'string'],
                'jurusan_alias' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                Jurusan::where('jurusan_id', $jurusan->jurusan_id)->update([
                    'jurusan_nama' => $request->input('jurusan_name'),
                    'jurusan_alias' => $request->input('jurusan_alias'),
                    'jurusan_code' => $request->input('jurusan_code') ? $request->input('jurusan_code') : null,
                ]);

                return redirect()->to(route('jurusan.index'))->with('success', 'Updated Successfully');
            } else {
                return redirect()->to(route('jurusan.index'))->with('failed', $validated->getMessageBag());
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        try {
            $data = $jurusan->find(request()->segment(3));
            Jurusan::destroy($data->jurusan_id);

            return redirect()->back()->with('success', 'Deleted Successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
