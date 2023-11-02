<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    /**
     * Constructor for KegiatanController.
     */
    public function __construct(public $name = 'Kegiatan')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.kegiatan.index',[
            'name' => $this->name,
            'kegiatan' => Kegiatan::leftJoin('organisasis','kegiatans.organisasi_id','=','organisasis.organisasi_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kegiatan.create',[
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
            'organisasi_id' => ['required'],
            'kegiatan_anggaran' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            Kegiatan::create([
                'organisasi_id' => $request->input('organisasi_id'),
                'kegiatan_anggaran' => $request->input('kegiatan_anggaran'),
            ]);

            return redirect()->to(route('kegiatan.index'))->with('success', 'Added Successfully');
        } else {
            return redirect()->to(route('kegiatan.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('backend.kegiatan.edit',[
            'name' => $this->name,
            'kegiatan' => $kegiatan,
            'organisasi' => \App\Models\Organisasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = Validator::make($request->all(), [
            'organisasi_id' => ['required'],
            'kegiatan_anggaran' => ['required', 'string'],
        ]);

        if (!$validated->fails()) {
            Kegiatan::where('kegiatan_id',$kegiatan->kegiatan_id)->update([
                'organisasi_id' => $request->input('organisasi_id'),
                'kegiatan_anggaran' => $request->input('kegiatan_anggaran'),
            ]);

            return redirect()->to(route('kegiatan.index'))->with('success', 'Updated Successfully');
        } else {
            return redirect()->to(route('kegiatan.index'))->with('failed', $validated->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->kegiatan_id);

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
