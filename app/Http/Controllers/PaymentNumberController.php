<?php

namespace App\Http\Controllers;

use App\Models\PaymentNumber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentNumber = PaymentNumber::first();
        return view('admin.modules.payment_numbers.index', compact('paymentNumber'));
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
        $data = $request->all();
        $paymentNumber = PaymentNumber::first();
        if ($paymentNumber) {

            $paymentNumber->update($data);

            Alert::toast("Updated Successfully.", 'success');
        } else {
            PaymentNumber::create($data);
            Alert::toast("Created Successfully.", 'success');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentNumber  $paymentNumber
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentNumber $paymentNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentNumber  $paymentNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentNumber $paymentNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentNumber  $paymentNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentNumber $paymentNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentNumber  $paymentNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentNumber $paymentNumber)
    {
        //
    }
}
