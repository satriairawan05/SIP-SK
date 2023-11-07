<?php

namespace App\Http\Controllers\Backend;

use App\Models\Approval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    /**
     * Constructor for ApprovalController.
     */
    public function __construct(public $name = 'Approval')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->input('js_id')) {
            return view('backend.setting.approval.index', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::all()
            ]);
        } else {
            return view('backend.setting.approval.index2', [
                'name' => $this->name,
                'surat' => \App\Models\JenisSurat::where('js_id', request()->input('js_id'))->first(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approval $approval)
    {
        //
    }
}
