<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function tech_web_list_company()
    {
        return view('admin.company.index',[
            'company_types'=>Company::get()
        ]);
    }

    public function tech_web_store_company(Request $request)
    {
        // dd($request->all());
        Company::save_company($request);
        return back()->with('message','Company Type Added Successfully');
    }

    public function tech_web_edit_company($id)
    {
        return view('admin.company.edit',[
            'company_type'=>Company::find($id),
        ]);
    }

    public function tech_web_update_company(Request $request)
    {
        // dd($request->all());
        Company::update_company($request);
        return redirect()->route('list.company')->with('message','Company Type Updated Successfully');
    }

    public function tech_web_delete_company($id)
    {
        // dd($id);
        $company_type = Company::find($id);
        $company_type->delete();
        return back()->with('message','Company Type Deleted Successfully');
    }
}
