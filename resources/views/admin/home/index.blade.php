@extends('admin.master')
@section('title')
    Admin Dashboard
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles mt-4 mt-md-0">
        <div class="col-5 align-self-center">
            <h4 class="text-themecolor">Admin Dashboard</h4>
        </div>
        <div class="col-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    {{-- <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li> --}}
                    <li class="breadcrumb-item active">@if (auth()->user()->is_admin == 1)Admin @elseif (auth()->user()->is_admin == 3) Agent @endif Dashboard</li>
                </ol>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    @if (auth()->user()->is_admin == 1)
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h5>Total Users</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $user->count() }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h5>Total Agents</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agent->count() }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-header">
                                <h5>Total User Deposits(Today)</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $userDeposit['today'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-header">
                                <h5>Total User Deposits</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $userDeposit['total'] }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-header">
                                <h5>Total Withdraw(Today)</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $userWithdraw['today'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-header">
                                <h5>Total Withdraw</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $userWithdraw['total'] }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-header">
                                <h5>Commission(Today)</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $totalAgentCommission['today'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-header">
                                <h5>Total Commission</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $totalAgentCommission['total'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-header">
                                <h5>Total User Balance</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $userbalance }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-header">
                                <h5>Total Agent Balance</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentbalance }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (auth()->user()->is_admin == 3)
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h5>Users</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentsUser->count() }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-header">
                                <h5>User Deposits(Today)</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentsUserDeposit['today'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-header">
                                <h5>User Deposits</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentsUserDeposit['total'] }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h5>Commission(Today)</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentCommission['today'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-header">
                                <h5>Total Commission</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ $agentCommission['total'] }}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-2">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-header">
                                <h5>Balance</h5>
                            </div>
                            <div class="card-body text-center">
                                <h2>{{ auth()->user()->wallet->balance }} ৳</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View
                                    Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-dark text-white text-center">
                            <h2 class="mb-0">Referral Program</h2>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="mt-0">Referral Code</h5>
                            <div class="input-group justify-content-center mb-3">
                                <input id="referralCodeInput" type="text"
                                    class="form-control text-center font-weight-bold"
                                    value="{{ auth()->user()->referral ?? null }}" readonly>
                                <button class="btn btn-primary" type="button" onclick="copyReferralCode()">Copy</button>
                            </div>
                            <h5>Total Commission</h5>
                            <div class="input-group justify-content-center">
                                <input type="text" class="form-control text-center font-weight-bold"
                                    value="{{ auth()->user()->customerCommission()->sum('amount') }}" readonly>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-dark mt-2 w-50"><i class="fa-solid fa-share-nodes"></i>
                                Share
                                Now</a>
                            <a href="#" class="btn btn-dark mt-2 w-50">Referral Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <script>
            function copyReferralCode() {
                // Get the referral code input element
                var referralCodeInput = document.getElementById('referralCodeInput');

                // Select the referral code text
                referralCodeInput.select();
                referralCodeInput.setSelectionRange(0, 99999); /* For mobile devices */

                // Copy the selected text to the clipboard
                document.execCommand('copy');

                // Remove the text selection
                window.getSelection().removeAllRanges();
            }
        </script>
    @endif
@endsection
