<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id','desc')->get();
        return view('division.index',[
            'divisions' => $divisions,
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

        Division::create([
            'name' => request('name'),
        ]);
        
        toastr()->success('部署を追加しました');
        return redirect() -> back();
    }

    public function show(Division $division)
    {
        //
    }

    public function edit(Division $division)
    {
        //
    }

    public function update(Request $request, Division $division)
    {
        $request -> validate([
            'name.*' => 'required',
        ]);

        foreach (request('name') as $key => $name) {
            $division = Division::find($key);
            $division -> name = $name;
            $division -> save();
        }

        toastr() -> success('更新しました');
        return redirect() -> back();
    }

    public function destroy(Request $request, Division $division)
    {
        Division::find(request('division_id'))->delete();
        toastr() -> error('削除しました');
        return redirect() -> back();
    }
}
