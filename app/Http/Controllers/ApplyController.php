<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Career;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function tech_web_add_apply()
    {
        return view('admin.apply.apply',[
            'applies'=>Apply::get(),
            'careers'=>Career::get()
        ]);

    }

    public function tech_web_view_apply($id)
    {
        return view('admin.apply.view_apply',[
            'apply'=>Apply::find($id),
            'careers'=>Career::get()
        ]);
    }
    public function tech_web_edit_apply($id)
    {
        return view('admin.apply.edit_apply',[
            'apply'=>Apply::find($id),
            'careers'=>Career::get()
        ]);
    }

    public function tech_web_update_apply(Request $request)
    {
        // dd($request->all());
        Apply::update_apply($request);
        return back()->with('message','Updated Successfully');
    }
}
