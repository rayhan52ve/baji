@extends('frontend.layouts.master')
@section('content')
    <style>
        .margin-top-adjust {
            margin-top: 150px;
            /* Default for PC */
        }

        @media (max-width: 768px) {

            /* Adjust the breakpoint as needed for mobile */
            .margin-top-adjust {
                margin-top: 70px;
            }
        }
    </style>
    <div class="margin-top-adjust">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card position-relative" style="height:auto;background: rgb(89, 209, 115);">
                    <!-- Close button -->
                    <a href="{{ url('/') }}" class="btn-close btn-light btn-circle position-absolute top-0 end-0 m-2"
                        aria-label="Close"></a>
                    <!-- Card content -->
                    <div class="vertical-align-middle">
                        <div class="m-1">
                            <div class="text-center">
                                <h2>Baji Challenge</h2>
                                <h4 class="m-1"> Welcome Back,
                                    {{ auth()->user()->name ?? 'Please login to see your progress.' }}</h4>
                            </div>
                            @if ($activeLevel)
                                @php
                                    $percentage = ($totalDeposit / $activeLevel->requirement) * 100;
                                @endphp
                                <div class="progress mt-1">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width: {{ @$percentage }}%" aria-valuenow="{{ @$percentage }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                    <h5 class="">({{ $totalDeposit }}/{{ $activeLevel->requirement }})</h5>
                                </div>
                                <div class="text-center my-1">
                                    <h4 class="">Level {{ $activeLevel->level }}</h4>
                                </div>
                            @else
                                <div class="progress mt-1">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                    <h5 class="">(0/0)</h5>
                                </div>
                                <div class="text-center my-1">
                                    <h4 class="">All level Completed</h4>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 5px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(202, 202, 211);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="d-flex justify-content-between">
                                <h5>Level</h5>
                                <h5>Reward</h5>
                                <h5>Requirement</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($bajiChallenges as $bajiChallenge)
        <div class="" style="margin-top: 5px;">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style="background:rgb(243, 245, 244);">
                        <div class="vertical-align-middle">
                            <div class="m-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>
                                        <span class="number text-white"
                                            style="position: absolute; top: 43px; left: 27px; transform: translate(-50%, -50%);">{{ $bajiChallenge->level }}</span>

                                        <img src="{{ asset('assets/deposit/vip-level-no.png') }}" width="40px"
                                            alt="">
                                    </h5>
                                    <h5 class="text-center">
                                        <img src="{{ asset('assets/deposit/coins.png') }}" width="60px" alt="">
                                        <p>Free ৳ {{ $bajiChallenge->reward }}</p>
                                    </h5>
                                    <h5 class="text-center">৳ {{ $bajiChallenge->requirement }}<br>
                                        @if ($totalDeposit >= $bajiChallenge->requirement)
                                            <form action="{{ route('user.claimReward', $bajiChallenge->id) }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}">
                                                <button type="submit"
                                                    class="btn btn-{{ $bajiChallenge->claimed ? 'secondary' : 'warning' }} btn-sm mx-3 mt-2"
                                                    {{ $bajiChallenge->claimed ? 'disabled' : '' }}>{{ $bajiChallenge->claimed ? 'Claimed' : 'Claim' }}</button>
                                            </form>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




    <div style="margin:10px"></div>
@endsection
