<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function tech_web_add_package()
    {
        return view('admin.package.package',[
            'packages'=>Package::get()
        ]);

    }

    public function tech_web_store_package(Request $request)
    {
        Package::save_package($request);
        return back()->with('message','Package added successfully');
    }

    public function tech_web_edit_package($id)
    {
        return view('admin.package.edit_package',[
            'package'=>Package::find($id),
        ]);
    }

    public function tech_web_update_package(Request $request)
    {
        Package::update_package($request);
        return back()->with('message','Package update successfully');
    }
}
