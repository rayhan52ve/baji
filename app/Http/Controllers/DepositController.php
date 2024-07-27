<?php

namespace App\Http\Controllers;

use App\Models\Commission1;
use App\Models\Commission2;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Deposit Request';
        $deposits = Deposit::where('status', 0)->latest()->get();
        return view('admin.modules.deposit.index', compact('deposits', 'pageTitle'));
    }

    public function history()
    {
        $pageTitle = 'Deposit History';
        $deposits = Deposit::where('status', '!=', 0)->latest()->get();
        return view('admin.modules.deposit.index', compact('deposits', 'pageTitle'));
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
    public function validateDepositForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|string|in:Bkash,Nagad,Rocket,Upay,BTC,Paypal',
            'deposit_channel' => 'required|string|in:Cash Out,Send Money',
            'amount' => 'required|integer|min:200|max:25000',
            'bonus' => 'nullable|integer|in:20,10,200',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // If validation passes, process the form submission
        // ...

        return response()->json(['success' => 'Form is valid and has been processed'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->bonus) {
            $data['amount'] = $request->amount + ($request->amount * $request->bonus / 100);
        }
        Deposit::create($data);
        Alert::toast("Deposit Requested Successfully.", 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }

    public function updateDepositStatus(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);

        $status = $request->status;



        if ($status == 1) {

            $deposit->status = 1;
            $deposit->save();

            $user = User::findOrFail($request->user_id);
            $depositAmount = $user->activeDeposits->sum('amount');
            
            if ($depositAmount >= 2000 && $user->onetime_commission == 0) {
                $referCommission = 500;
            }

            $refererId = $user->referer_id;
            if ($refererId) {
                $agent = User::where('id', $refererId)->where('is_admin', 3)->first();
                $customer = User::where('id', $refererId)->where('is_admin', 0)->first();
                @$passiveAgent = User::where('id', $customer->agent_id)->where('is_admin', 3)->first();

                if ($agent) {

                    Commission1::create([
                        'agent_id' => $agent->id,
                        'customer_id' => $user->id,
                        'amount' => $request->amount * 0.10,
                    ]);

                    $agentWallet = Wallet::where('user_id', $agent->id)->first();
                    $agentWallet->balance += $request->amount * 0.10;
                    $agentWallet->save();
                } elseif ($customer) {

                    Commission2::create([
                        'old_user_id' => $customer->id,
                        'new_user_id' => $user->id,
                        'amount' => ($request->amount * 0.01) + ($referCommission ?? 0), // Add 1%
                    ]);
                    $customerWallet = Wallet::where('user_id', $customer->id)->first();
                    $customerWallet->balance += $request->amount * 0.01  + ($referCommission ?? 0);
                    $customerWallet->save();

                    if ($depositAmount >= 2000 && $user->onetime_commission == 0) {
                        $user->onetime_commission = 1;
                        $user->save();
                    }

                    if ($passiveAgent) {
                        Commission1::create([
                            'agent_id' => $passiveAgent->id,
                            'customer_id' => $user->id,
                            'amount' => $request->amount * 0.10, // Add 10%
                        ]);
                        $agentWallet = Wallet::where('user_id', $passiveAgent->id)->first();
                        $agentWallet->balance += $request->amount * 0.10;
                        $agentWallet->save();
                    }
                }
            }

            $wallet = Wallet::where('user_id', $request->user_id)->first();
            $wallet->balance += $request->amount;

            $wallet->save();


            Alert::toast("Deposit Accepted.", 'success');
        } elseif ($status == 2) {
            $deposit->status = 2;
            $deposit->save();
            Alert::toast("Deposit Declined.", 'success');
        }

        return redirect()->back();
    }
}
