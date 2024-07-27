<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Withdraw Request';
        $withdraws = Withdraw::where('status', 0)->latest()->get();
        return view('admin.modules.withdraw.index', compact('withdraws', 'pageTitle'));
    }

    public function history()
    {
        $pageTitle = 'Withdraw History';
        $withdraws = Withdraw::where('status', '!=', 0)->latest()->get();
        return view('admin.modules.withdraw.index', compact('withdraws', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $wallet = Wallet::where('user_id', $request->user_id)->first();
        if ($wallet->balance >= $request->withdraw_amount) {
            Withdraw::create($request->all());

            $wallet->balance -= $request->withdraw_amount;
            $wallet->save();

            Alert::toast("Withdraw Requested Successfully.", 'success');
        } else {
            Alert::toast("You Dont have Enough Balance.", 'success');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        //
    }

    public function updateWithdrawStatus(Request $request, $id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $status = $request->status;

        if ($status == 1) {
            $withdraw->status = 1;
            $withdraw->save();
            Alert::toast("Withdraw Accepted.", 'success');
        } elseif ($status == 2) {
            $wallet = Wallet::where('user_id', $request->user_id)->first();

            $wallet->balance += $request->amount;
            $wallet->save();

            $withdraw->status = 2;
            $withdraw->save();
            Alert::toast("Withdraw Declined.", 'success');
        }

        return redirect()->back();
    }
}
