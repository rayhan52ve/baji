<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class ProfileTabsController extends Controller
{

    public function deposit()
    {
       //
    }

    public function transaction()
    {
        $deposits = Deposit::where('user_id',auth()->user()->id)->latest()->get();
        $withdraws = Withdraw::where('user_id',auth()->user()->id)->latest()->get();
        return view('frontend.modules.profile_tabs.transaction_record',compact('deposits','withdraws'));
    }

}
