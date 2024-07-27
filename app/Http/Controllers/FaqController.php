<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function tech_web_add_faq()
    {
        return view('admin.faq.faq',[
            'faqs'=>Faq::get(),
        ]);

    }

    public function tech_web_store_faq(Request $request)
    {
        // dd($request->all());
        Faq::save_faq($request);
        return back()->with('message','faq added successfully');
    }

    public function tech_web_edit_faq($id)
    {
        return view('admin.faq.edit_faq',[
            'faq'=>Faq::find($id),
        ]);
    }

    public function tech_web_update_faq(Request $request)
    {
        // dd($request->all());
        Faq::update_faq($request);
        return back()->with('message','faq update successfully');
    }
}
