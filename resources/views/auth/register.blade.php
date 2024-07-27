@extends('frontend.layouts.master')
@section('content')
    {{-- <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f br-1">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Register</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="index.html">Home </a></li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Account Section start -->
        <section class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3>Register</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="">

                                    <form class="login-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control" id="name" type="text"
                                                        name="name" type="text" placeholder="Username" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control" id="email" type="email"
                                                        name="email" type="text" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control" id="pwd" name="password"
                                                        placeholder="Password" type="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input class="form-control" id="pwd_2"
                                                        name="password_confirmation" placeholder="Confirm Password"
                                                        type="password">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12 mb-20">
                                                <div class="checkbox style3">
                                                    <input class="form-control" type="checkbox" id="test_1">
                                                    <label class="form-label" for="test_1">
                                                        I Agree with the <a class="link style1" href="">Terms
                                                            &amp; conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="form-control" class="btn style1 w-100 d-block">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="mb-0">Have an Account? <a class="link style1"
                                                        href="{{ route('login') }}">Sign In</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Account Section end -->


    </div> --}}
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>

    <section style="height: 100vh;background-color: rgb(250, 243, 243);margin-bottom:10px">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration mb-4">
                        <div class="row g-0">

                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-2 text-uppercase">Registration</h3>
                                    @if (session('error'))
                                        <p class="text-danger">{{ session('error') }}</p>
                                    @endif

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div data-bs-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1m">Username</label>
                                                    <input type="text" name="name" id="form3Example1m"
                                                        value="{{ old('name') }}"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        required />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div data-bs-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1n">Password</label>
                                                    <input type="password" name="password" id="form3Example1n"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        required />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div data-bs-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1n">Confirm
                                                        Password</label>
                                                    <input class="form-control " id="pwd_2"
                                                        name="password_confirmation" type="password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <div data-bs-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1m">Currency</label>
                                                    <select class="form-control w-100" name="currency" required>
                                                        <option value="BDT">BDT</option>
                                                        <option value="INR">INR</option>
                                                        <option value="USD">USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div data-bs-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example97">Referral Code</label>
                                                    <input type="text" name="on_refer" value="{{ old('on_refer') }}"
                                                        id="form3Example97" class="form-control " />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <label class="form-label" for="form3Example1m">Phone Number</label>
                                            <div class="col-4 col-md-3 mb-3">
                                                <select class="form-control" name="calling_code" required>
                                                    <option value="+880">+880</option>
                                                    <option value="+91">+91</option>
                                                    <option value="+1">+1</option>
                                                </select>

                                            </div>
                                            <div class="col-8 col-md-9 mb-3">

                                                <div data-bs-input-init class="form-outline">
                                                    <input type="number" name="phone" id="form3Example1m"
                                                        value="{{ old('phone') }}"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        required />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        {{-- <div data-bs-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form3Example97">Email</label>
                                            <input type="email" name="email" id="form3Example97"
                                                class="form-control @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}


                                        <div class="d-flex justify-content-end pt-3">
                                            {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-light btn-lg">Reset all</button> --}}
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning ms-2">Submit Form</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('frontend/assets/img/refer_desktop.jpg') }}" width="100%" style="height: 100%"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
