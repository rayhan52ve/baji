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
                                    Withdraw Amount
                                </th>
                                <th>
                                    balance
                                </th>
                                <th>
                                    Status
                                </th>
                                @if (url()->current() == route('withdraw.index'))
                                    <th>
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        {{ $item->user->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->withdraw_method ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->withdraw_number ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->withdraw_amount ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->user->wallet?->balance ?? null }}
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-rounded btn-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">
                                            {!! $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Accepted' : 'Declined') !!}
                                        </button>
                                    </td>
                                    @if (url()->current() == route('withdraw.index'))
                                        <td>
                                            <form action="{{ route('updateWithdrawStatus', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="user_id" value="{{ $item->user->id ?? null }}">
                                                <input type="hidden" name="amount"
                                                    value="{{ $item->withdraw_amount ?? null }}">

                                                <!-- Accept Button -->
                                                <button type="submit" name="status" value="1" class="btn btn-sm btn-success"
                                                    title="Accept">Accept</button>
                                                <!-- Decline Button -->
                                                <button type="submit" name="status" value="2" class="btn btn-sm btn-danger"
                                                    title="Decline">Decline</button>
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
