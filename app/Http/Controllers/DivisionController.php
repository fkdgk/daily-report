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
        //
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
        // return $request;
        $request -> validate([
            'name' => 'required',
        ]);
        return redirect() -> back();
    }

    public function destroy(Division $division)
    {
        //
    }
}
