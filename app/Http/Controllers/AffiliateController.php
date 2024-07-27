<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function tech_web_list_affiliate()
    {
        return view('admin.affiliate.affiliatelist',[
            'affiliates'=>Affiliate::get()
        ]);

    }

    public function tech_web_view_affiliate($id)
    {
        return view('admin.affiliate.edit_affiliate',[
            'affiliate'=>Affiliate::find($id),
        ]);
    }

    public function tech_web_edit_affiliate($id)
    {
        return view('admin.affiliate.edit_affiliate',[
            'affiliate'=>Affiliate::find($id),
        ]);
    }

    public function tech_web_update_affiliate(Request $request)
    {
        // dd($request->all());
        Affiliate::update_affiliate($request);
        return back()->with('message','Affiliate update successfully');
    }
}
