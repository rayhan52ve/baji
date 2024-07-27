@extends('frontend.layouts.master')
@section('content')
    <div class="container" style="margin-top: 100px;">

        <div class="card">
            <div class="card-body">
                <ul class="nav  mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="width: 50%;">
                        <a class="nav-link form-control active btn btn-warning text-dark w-100" id="pills-deposit-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-deposit" role="tab"
                            aria-controls="pills-deposit" aria-selected="true">Deposit</a>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 50%;">
                        <a class="nav-link btn btn-success text-dark  w-100" id="pills-withdrawal-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-withdrawal" role="tab" aria-controls="pills-withdrawal"
                            aria-selected="false">Withdrawal</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel"
                            aria-labelledby="pills-deposit-tab" tabindex="0">
                            <div class="table-responsive m-t-20">
                                <h3 class="text-center ">
                                    Deposit History
                                </h3>
                                @foreach ($deposits as $key => $item)
                                    <table id="config-table" class="table display table-striped border no-wrap ">
                                        <tbody class="text-center">
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Payment method</th>
                                                <td>{{ $item->payment_method ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{ $item->amount ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bonus</th>
                                                <td>{{ $item->bonus ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><button
                                                        class="btn btn-sm btn-rounded btn-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">
                                                        {!! $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Accepted' : 'Declined') !!}
                                                    </button></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-withdrawal" role="tabpanel"
                            aria-labelledby="pills-withdrawal-tab" tabindex="0">
                            <div class="table-responsive m-t-20">
                                <h3 class="text-center ">
                                    Withdraw History
                                </h3>
                                @foreach ($withdraws as $key => $item)
                                    <table id="" class="table display table-striped border no-wrap ">
                                        <tbody class="text-center">
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Payment method</th>
                                                <td>{{ $item->withdraw_method ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{ $item->withdraw_amount ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><button
                                                        class="btn btn-sm btn-rounded btn-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">
                                                        {!! $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Accepted' : 'Declined') !!}
                                                    </button></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                @endforeach

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div style="margin-bottom:60px"></div>
    @endsection
