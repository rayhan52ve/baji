<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function tech_web_add_career()
    {
        return view('admin.career.career',[
            'careers'=>Career::get()
        ]);

    }

    public function tech_web_store_career(Request $request)
    {
        // dd($request->all());
        Career::save_career($request);
        return back()->with('message','career added successfully');
    }

    public function tech_web_edit_career($id)
    {
        return view('admin.career.edit_career',[
            'career'=>Career::find($id),
        ]);
    }

    public function tech_web_update_career(Request $request)
    {
        // dd($request->all());
        Career::update_career($request);
        return back()->with('message','career update successfully');
    }

}
