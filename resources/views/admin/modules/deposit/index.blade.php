@extends('admin.master')
@section('body')
    <div class="container-fluid mt-5">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive m-t-20">
                    <h3 class="text-center ">
                        @if (session()->get('language') == 'bangla')
                            {{ $pageTitle }}
                        @else
                            {{ $pageTitle }}
                        @endif
                    </h3>
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>
                                    SL
                                </th>
                                {{-- <th>
                                        Image
                                </th> --}}
                                <th>
                                    Name
                                </th>
                                <th>
                                    Payment method
                                </th>
                                <th>
                                    Payment Number
                                </th>
                                <th>
                                    Transaction Id
                                </th>
                                <th>
                                    Deposit Channel
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Bonus
                                </th>

                                <th>
                                    Status
                                </th>
                                @if (url()->current() == route('deposit.index'))
                                    <th>
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        {{ $item->user->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->payment_method ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->payment_number ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->transaction_id ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->deposit_channel ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->amount ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->bonus ?? null }}
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-rounded btn-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">
                                            {!! $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Accepted' : 'Declined') !!}
                                        </button>
                                    </td>
                                    @if (url()->current() == route('deposit.index'))
                                        <td>
                                            <form action="{{ route('updateDepositStatus', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="user_id" value="{{ $item->user->id ?? null }}">
                                                <input type="hidden" name="amount" value="{{ $item->amount ?? null }}">
                                                <!-- Accept Button -->
                                                <button type="submit" name="status" value="1"
                                                    class="btn btn-sm btn-success" title="Accept">Accept</button>
                                                <!-- Decline Button -->
                                                <button type="submit" name="status" value="2"
                                                    class="btn btn-sm btn-danger" title="Decline">Decline</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
