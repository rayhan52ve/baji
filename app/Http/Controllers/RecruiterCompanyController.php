<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruiterCompany;

class RecruiterCompanyController extends Controller
{
    public function tech_web_list_recruiter()
    {
        return view('admin.recruiter.index',[
            'recruiters'=>RecruiterCompany::get(),
        ]);

    }

    public function tech_web_store_recruiter(Request $request)
    {
        // dd($request->all());
        RecruiterCompany::save_recruiter($request);
        return back()->with('message','recruiter added successfully');
    }

    public function tech_web_edit_recruiter($id)
    {
        return view('admin.recruiter.edit',[
            'recruiter'=>RecruiterCompany::find($id),
        ]);
    }

    public function tech_web_update_recruiter(Request $request)
    {
        RecruiterCompany::update_recruiter($request);
        return redirect()->route('list.recruiter')->with('message','recruiter update successfully');
    }

}
