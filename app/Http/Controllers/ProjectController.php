<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort')->get();
        return view('project.index',[
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
        ]);

        Project::create([
            'name' => request('name'),
        ]);
        
        toastr()->success('部署を追加しました');
        return redirect() -> back();
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        $request -> validate([
            'name.*' => 'required',
        ]);

        if(!request('name')){
            toastr() -> error('データがありません');
            return redirect() -> back();
        }
        
        DB::beginTransaction();
        $i = 0;
        try {
            foreach (request('name') as $key => $name) {
                $project = Project::find($key);
                $project -> name = $name;
                $project -> sort = $i;
                $project -> save();
                $i++;
            }
            toastr() -> success('更新しました');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect() -> back();
    }

    public function destroy(Project $project)
    {
        //
    }
}
