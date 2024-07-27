<?php

namespace App\Http\Controllers;

use App\Models\FieldAgent;
use Illuminate\Http\Request;

class FieldAgentController extends Controller
{
    public function tech_web_list_fieldagent()
    {
        return view('admin.fieldagent.fieldagentlist',[
            'fieldagents'=>FieldAgent::get()
        ]);

    }

    public function tech_web_view_fieldagent($id)
    {
        return view('admin.fieldagent.view_fieldagent',[
            'fieldagent'=>FieldAgent::find($id),
        ]);
    }

    public function tech_web_edit_fieldagent($id)
    {
        return view('admin.fieldagent.edit_fieldagent',[
            'fieldagent'=>FieldAgent::find($id),
        ]);
    }

    public function tech_web_update_fieldagent(Request $request)
    {
        // dd($request->all());
        FieldAgent::update_fieldagent($request);
        return back()->with('message','Successfully Updated');
    }
}
