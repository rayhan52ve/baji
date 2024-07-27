<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function tech_web_list_serviceprovider()
    {
        return view('admin.serviceprovider.serviceproviderlist',[
            'serviceproviders'=>ServiceProvider::get()
        ]);

    }

    public function tech_web_view_serviceprovider($id)
    {
        return view('admin.serviceprovider.view_serviceprovider',[
            'serviceprovider'=>ServiceProvider::find($id),
        ]);
    }

    public function tech_web_edit_serviceprovider($id)
    {
        return view('admin.serviceprovider.edit_serviceprovider',[
            'serviceprovider'=>ServiceProvider::find($id),
        ]);
    }

    public function tech_web_update_serviceprovider(Request $request)
    {
        // dd($request->all());
        ServiceProvider::update_ServiceProvider($request);
        return back()->with('message','Successfully Updated');
    }
}
