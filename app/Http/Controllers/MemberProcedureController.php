<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberProcedure;

class MemberProcedureController extends Controller
{
    public function tech_web_list_memberprocedure()
    {
        return view('admin.memberprocedure.index',[
            'memberprocedures'=>MemberProcedure::get()
        ]);

    }

    public function tech_web_store_memberprocedure(Request $request)
    {
        // dd($request->all());
        MemberProcedure::save_memberProcedure($request);
        return back()->with('message','Member Procedure added successfully');
    }

    public function tech_web_edit_memberprocedure($id)
    {
        return view('admin.memberprocedure.edit',[
            'memberprocedure'=>MemberProcedure::find($id),
        ]);
    }

    public function tech_web_update_memberprocedure(Request $request)
    {
        // dd($request->all());
        MemberProcedure::update_memberProcedure($request);
        return back()->with('message','Member Procedure update successfully');
    }
}
