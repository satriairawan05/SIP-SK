<?php

namespace App\Http\Controllers\Backend;

use App\Models\Approval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        try {
            if (!request()->input('js_id')) {
                return view('backend.setting.approval.index', [
                    'name' => $this->name,
                    'surat' => \App\Models\JenisSurat::all(),
                ]);
            } else {
                return view('backend.setting.approval.index2', [
                    'name' => $this->name,
                    'surat' => \App\Models\JenisSurat::where('js_id', request()->input('js_id'))->first(),
                    'approval' => Approval::all(),
                    'user' => \App\Models\User::whereNot('id', 1)->get(),
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
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
        try {
            $validated = Validator::make($request->all(), [
                'app_ordinal' => ['required', 'string'],
                'user_id' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                $surat = \App\Models\JenisSurat::where('js_jenis', $request->input('js_jenis'))->first();

                Approval::create([
                    'user_id' => $request->input('user_id'),
                    'js_id' => $surat->js_id,
                    'app_ordinal' => $request->input('app_ordinal'),
                ]);

                return redirect()->back()->with('success', 'Added Successfully!');
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
        try {
            $validated = Validator::make($request->all(), [
                'app_ordinal' => ['required', 'string'],
                'user_id' => ['required', 'string'],
            ]);

            if (!$validated->fails()) {
                $surat = \App\Models\JenisSurat::where('js_jenis', $request->js_jenis)->first();

                Approval::where('app_id', $approval->app_id)->update([
                    'user_id' => $request->input('user_id'),
                    'js_id' => $surat->js_id,
                    'app_ordinal' => $request->input('app_ordinal'),
                ]);

                return redirect()->back()->with('success', 'Updated Successfully!');
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
    public function destroy(Approval $approval)
    {
        try {
            Approval::destroy($approval->app_id);

            return redirect()->back()->with('success', 'Deleted Successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}