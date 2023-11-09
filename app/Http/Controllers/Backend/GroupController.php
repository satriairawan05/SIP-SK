<?php

namespace App\Http\Controllers\Backend;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Constructor for GroupController.
     */
    public function __construct(public $name = 'Role Permission')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            return view('backend.setting.role.index', [
                'name' => $this->name,
                'roles' => Group::all()
            ]);
        } else {
            return redirect()->back()->with('failed', "You not Have Authority");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            return view('backend.setting.role.create', [
                'name' => $this->name,
                'page_distincts' => \App\Models\Page::distinct('page_name')->get('page_name'),
                'pages' => \App\Models\Page::all(),
            ]);
        } else {
            return redirect()->back()->with('failed', "You not Have Authority");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            $validate = Validator::make($request->all(), [
                'group_name' => 'required',
            ]);

            if (!$validate->fails()) {
                $group = new Group();
                $group->group_name = str_replace('_', ' ', $request->group_name);
                $group->save();
                $pages = \App\Models\Page::all();
                foreach ($pages as $page) {
                    $groupPage = new \App\Models\GroupPage();
                    $groupPage->page_id = $page->page_id;
                    $groupPage->group_id = $group->group_id;
                    $groupPage->access = $request->input($page->page_id) == 'on' ? 1 : 0;
                    $groupPage->save();
                }

                return redirect()->to(route('role.index'))->with('success', 'Added Role Successfully!');
            }

            return redirect()->back()->with('failed', $validate->getMessageBag())->withInput();
        } else {
            return redirect()->back()->with('failed', "You not Have Authority");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            $role = $group->find(request()->segment(3));
            return view('backend.setting.role.edit', [
                'name' => $this->name,
                'group' => $role,
                'page_distincts' => \App\Models\Page::distinct('page_name')->get('page_name'),
                'pages' => \App\Models\GroupPage::leftJoin('pages', 'pages.page_id', '=', 'group_pages.page_id')->where('group_id', '=', $role->group_id)->get(),
            ]);
        } else {
            return redirect()->back()->with('failed', "You not Have Authority");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group, \App\Models\Page $page, \App\Models\GroupPage $groupPage)
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            $validate = Validator::make($request->all(), [
                'group_name' => 'required',
            ]);

            if (!$validate->fails()) {
                $role = $group->find(request()->segment(3));
                Group::where('group_id', $role->group_id)->update(['group_name' => $request->input('group_name')]);

                $pages = \App\Models\Page::all();
                foreach ($pages as $page) {
                    $groupPage->where('group_id', $role->group_id)
                        ->where('page_id', $page->page_id)
                        ->update(['access' => $request->input($page->page_id) == 'on' ? 1 : 0]);
                }

                return redirect()->to(route('role.index'))->with('success', 'Updated Role Successfully!');
            } else {
                return redirect()->back()->with('failed', "You not Have Authority");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        if (auth()->guard('admin')->user()->group_id == 1) {
            Group::where('group_id', $group->group_id)->delete();

            $pages = \App\Models\Page::all();
            foreach ($pages as $page) {
                $groupPage = \App\Models\GroupPage::where([
                    'group_id' => $group->group_id,
                    'page_id' => $page->page_id,
                ])->first();
                if ($groupPage) {
                    $groupPage->delete();
                }
            }

            return redirect()->to(route('role.index'))->with('success', 'Deleted Role Successfully!');
        } else {
            return redirect()->back()->with('failed', "You not Have Authority");
        }
    }
}
