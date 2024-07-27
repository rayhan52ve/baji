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
                                    @if (session()->get('language') == 'bangla')
                                        সি.নং
                                    @else
                                        SL
                                    @endif
                                </th>
                                {{-- <th>
                                        Image
                                </th> --}}
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Referral Code
                                </th>
                                @if (url()->current() == route('superadmin.agent') || url()->current() == route('superadmin.manage-user.index'))
                                    <th>
                                        Total Earning
                                    </th>
                                @endif
                                {{-- @if ($item->is_admin != 0) --}}
                                <th>
                                    Refer Count
                                </th>
                                {{-- @endif --}}
                                {{-- <th>
                                    @if (session()->get('language') == 'bangla')
                                        Address
                                    @else
                                        Address
                                    @endif
                                </th> --}}
                                {{-- <th>
                                    @if (session()->get('language') == 'bangla')
                                        Employee Type
                                    @else
                                        Employee Type
                                    @endif
                                </th> --}}
                                {{-- <th>
                                    @if (session()->get('language') == 'bangla')
                                        Status
                                    @else
                                        Status
                                    @endif
                                </th> --}}
                                <th>

                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>
                                        @if (@$item->userDetail->image)
                                            <img src="{{ asset('uploads/manage-user/' . $item->userDetail->image) }}"
                                                width="100px" alt="">
                                        @else
                                            <img src="{{ asset('assets/avatar.png') }}" width="100px" alt="">
                                        @endif
                                    </td> --}}
                                    <td>
                                        {{ $item->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->email ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->phone ?? null }}
                                    </td>
                                    <td>
                                        {{ $item->referral ?? null }}
                                    </td>
                                    @if (url()->current() == route('superadmin.agent'))
                                        <td>
                                            {{ @$item->agentCommission()->sum('amount') }} | <a class="btn btn-info btn-sm"
                                                href="{{ route('superadmin.agentCommissionDetails', $item->id) }}">View</a>
                                        </td>
                                    @elseif (url()->current() == route('superadmin.manage-user.index'))
                                        <td>
                                            {{ @$item->customerCommission()->sum('amount') }} | <a
                                                class="btn btn-info btn-sm"
                                                href="{{ route('superadmin.customerCommissionDetails', $item->id) }}">View</a>
                                        </td>
                                    @endif

                                    <td>
                                        {{ $referCounts[$item->id] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-{{ $item->status == 0 ? 'danger' : 'success' }}"
                                            href="{{ route('superadmin.userStatus', $item->id) }}">
                                            {!! $item->status == 0 ? 'Inactive' : 'Active' !!}</a>
                                    </td>
                                    {{-- <td><a href="{{ route('superadmin.manage-user.edit', $item->id) }}" title="Edit"
                                            class="btn btn-success"><i class="icon-note"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
