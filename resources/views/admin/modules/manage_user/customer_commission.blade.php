@extends('admin.master')
@section('body')
    <div class="container mt-5">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive m-t-20">
                    <h3 class="text-center ">

                        Commission History of {{ $user->name }}
                    </h3>
                    <h5 class="text-center ">Total Earning: {{ $user->customerCommission->sum('amount') }}</h5>
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>
                                    SL
                                </th>

                                <th>
                                    Customer
                                </th>
                                <th>
                                    Amount
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->customerCommission as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $item->customer->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->amount ?? null }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
