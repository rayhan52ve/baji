@extends('frontend.layouts.master')
@section('content')
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <!------ Include the above in your HEAD tag ---------->

    <div class="" style="margin-top: 40px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card position-relative" style="height:160px;background: rgb(226, 226, 236)">
                    <!-- Close button -->
                    <a href="{{ url('/') }}" class="btn-close btn-light btn-circle position-absolute top-0 end-0 m-2"
                        aria-label="Close"></a>
                    <!-- Card content -->
                    <div class="vertical-align-middle">
                        <div class="m-5">
                            <div class="d-flex">
                                <img src="{{ asset('assets/avatar.png') }}" class="rounded-circle" width="100px"
                                    alt="">
                                <h2 class="m-4">{{ auth()->user()->name }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="height:160px;background: rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-4">
                            <div class="row">
                                <div class="col-9 col-md-9">
                                    <h4 >Vip Level: Club</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-light" role="progressbar"
                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <h6 class="mt-2">Upgrade to next level:</h6>
                                    <h6>Deposit Required:</h6>

                                </div>
                                <div class="col-2 col-md-3 text-end ">
                                    <img src="{{ asset('assets/Bronze-Level.png') }}" class="rounded-circle" width="70px"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(202, 202, 211);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="d-flex justify-content-between">
                                <h6 id="buttons" class="mt-2">
                                    Main Wallet:
                                    {{-- <i class="fa-solid fa-arrows-rotate fa-lg mx-1"></i> --}}
                                    <i class="fa-regular fa-eye fa-lg mx-1" onclick="toggleBalance()"></i>
                                </h6>
                                <h6 id="balance"><b style="font-size:30px">৳</b> <span id="actualBalance"> {{ number_format(auth()->user()->wallet->balance, 2) }}</span></h6>

                                <script>
                                    function toggleBalance() {
                                        var balanceElement = document.getElementById('balance');
                                        var actualBalanceElement = document.getElementById('actualBalance');
                                        if (actualBalanceElement.textContent === '*****') {
                                            actualBalanceElement.textContent = actualBalanceElement.dataset.balance;
                                        } else {
                                            actualBalanceElement.dataset.balance = actualBalanceElement.textContent;
                                            actualBalanceElement.textContent = '*****';
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Funds</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <a href="{{ route('user.deposit') }}" class="btn btn-light btn-lg">
                                            <i class="fa-solid fa-money-bill-transfer"></i>
                                        </a>
                                        <p>Deposit</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <a href="{{ route('user.deposit') }}" class="btn btn-light btn-lg">
                                            <i class="fa-solid fa-money-bill-trend-up"></i>
                                        </a>
                                        <p>Withdrawal</p>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-money-bills"></i></button>
                                        <p>Instant Rebate</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-hand-holding-dollar"></i></button>
                                        <p>Claim Voucher</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">History</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-clock-rotate-left"></i></button>
                                        <p>Betting Records</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-clock-rotate-left"></i></button>
                                        <p>Turnover</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-regular fa-clock"></i></button>
                                        <p>Transfer Record</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-solid fa-gift"></i></button>
                                        <p>Bonus</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <a href="{{ route('user.transaction') }}" class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-tent-arrow-left-right"></i></a>
                                        <p>Transaction Record</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <a href="#" class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-tent-arrow-left-right"></i></a>
                                        <p>Redemption Record</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Get Free Coins</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-hand-holding-dollar"></i></button>
                                        <p>Deposit</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-calendar-check"></i></button>
                                        <p>Daily Check-In</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-solid fa-ticket"></i></button>
                                        <p>Claim Voucher</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-solid fa-ticket"></i></button>
                                        <p>Card Mania</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Get Rewards</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-dharmachakra"></i></button>
                                        <p>Fortune Spin</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-solid fa-store"></i></button>
                                        <p>Reward Store</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Profile</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-user-gear"></i></button>
                                        <p>Personal Info</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-user-shield"></i></button>
                                        <p>Change Password</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-building-columns"></i></button>
                                        <p>Bank Details</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-envelope-open-text"></i></button>
                                        <p>Inbox Messages</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-solid fa-users-between-lines"></i></button>
                                        <p>Referral</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Contact Us
                                </h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-between">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-solid fa-headset"></i></button>
                                        <p>Support</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-brands fa-whatsapp"></i></button>
                                        <p>WhatsApp</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-brands fa-telegram"></i></button>
                                        <p>Telegram</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i
                                                class="fa-brands fa-facebook-f"></i></button>
                                        <p>Facebook</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Download
                                </h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-start">
                                    <div class="col-md-2 col-lg-2 col-3 text-center my-2">
                                        <button class="btn btn-light btn-lg"><i class="fa-brands fa-android"></i></button>
                                        <p>Download Android</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="" style="margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="text-center">
                                <h6 class="mt-2"><a href="" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><i
                                            class=""><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-box-arrow-right"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                                <path fill-rule="evenodd"
                                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                            </svg></i> Logout</a>
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        p {
            font-size: 11px;
            text: bold;
            font-weight: 500;
        }
    </style>
@endsection
