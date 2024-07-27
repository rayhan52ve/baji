@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            Payment Numbers
                        </h4>
                        <form class="form-horizontal p-t-20"
                            action="{{ route('superadmin.payment-number.store') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group row">

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Bkash Payment</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="bkash_payment"
                                                    value="{{ $paymentNumber->bkash_payment ?? null }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Bkash Personal</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="bkash_personal"
                                                    value="{{ $paymentNumber->bkash_personal ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Nagad Payment</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="nagad_payment"
                                                    value="{{ $paymentNumber->nagad_payment ?? null }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Nagad Personal</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="nagad_personal"
                                                    value="{{ $paymentNumber->nagad_personal ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Rocket Payment</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="rocket_payment"
                                                    value="{{ $paymentNumber->rocket_payment ?? null }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Rocket Personal</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="rocket_personal"
                                                    value="{{ $paymentNumber->rocket_personal ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Upau Payment</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="upay_payment"
                                                    value="{{ $paymentNumber->upay_payment ?? null }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Upay Personal</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="upay_personal"
                                                    value="{{ $paymentNumber->upay_personal ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">BTC</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="btc"
                                                    value="{{ $paymentNumber->btc ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="uname1" class="col-sm-12 control-label mb-2">Paypal</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="uname1"
                                                    name="paypal"
                                                    value="{{ $paymentNumber->paypal ?? null }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="form-group row m-b-0">
                                <div class="col-sm-12 mt-2">
                                    <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
