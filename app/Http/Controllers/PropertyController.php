<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function tech_web_add_property()
    {
        return view('admin.property.property',[
            'properties'=>Property::get()
        ]);

    }

    public function tech_web_store_property(Request $request)
    {
        // dd($request->all());
        Property::save_property($request);
        return back()->with('message','properties added successfully');
    }

    public function tech_web_edit_property($id)
    {
        return view('admin.property.edit_property',[
            'property'=>Property::find($id),
        ]);
    }

    public function tech_web_update_property(Request $request)
    {
        // dd($request->all());
        Property::update_property($request);
        return back()->with('message','properties update successfully');
    }

}
