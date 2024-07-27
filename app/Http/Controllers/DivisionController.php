<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function tech_web_add_division()
    {
        return view('admin.division.division',[
            'divisions'=>Division::get(),
            'states'=>State::get()
        ]);

    }

    public function tech_web_store_division(Request $request)
    {
        // dd($request->all());
        Division::save_division($request);
        return back()->with('message','division added successfully');
    }

    public function tech_web_edit_division($id)
    {
        return view('admin.division.edit_division',[
            'division'=>Division::find($id),
            'states'=>State::get()
        ]);
    }

    public function tech_web_update_division(Request $request)
    {
        // dd($request->all());
        Division::update_division($request);
        return back()->with('message','division update successfully');
    }
}
