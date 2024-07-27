<header id="header" style="background-color: #0f3cc9" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-between justify-content-between">
        <div class="d-flex">
            <i class="bi bi-list mobile-nav-toggle"></i>
            <a href="" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                @php
                    $logo = \App\Models\Logo::latest()->first();
                @endphp
                <img src="{{ asset($logo->logo_image ?? null) }}" height="100px" width="100px" alt="">
                {{-- <h1>{{ $logo->site_name }}</h1> --}}
            </a>
        </div>


        <nav id="navbar-main" class="navbar d-lg-none">
            <ul class="seperator-list" style="padding:0;background:rgb(214, 211, 211);">
                {{-- <div style="background-color: rgb(0, 0, 0)">
                    <a href="" class="logo d-flex align-items-center">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        @php
                            $logo = \App\Models\Logo::latest()->first();
                        @endphp
                        <img src="{{ asset($logo->logo_image ?? null) }}" height="100px" width="100px" alt="">
                        <h1>{{ $logo->site_name }}</h1>
                    </a>
                </div> --}}
                <hr>
                <li><a href="{{ url('/') }}">Home</a></li>
                <hr>
                <li><a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                        aria-controls="multiCollapseExample1"><span>Cricket</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                </li>
                <hr>
                <li class="dropdown"><a href="category.html"> <span class="">Live
                            Casino</span></a>
                    <ul>
                        <li><a href="#">Evolution</a></li>
                        <li><a href="#">Sexy</a></li>
                        <li><a href="#">Pragmatic Play</a></li>
                        <li><a href="#">Play Touch</a></li>
                        <li><a href="#">Hot Road</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Slot Games</span></a>
                    <ul>
                        <li><a href="#">Jili</a></li>
                        <li><a href="#">PG Soft</a></li>
                        <li><a href="#">JDB</a></li>
                        <li><a href="#">Red Tiger</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Table Games</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Jili</a></li>
                        <li><a href="#">SPG</a></li>
                        <li><a href="#">King Maker</a></li>
                        <li><a href="#">SPRIBE</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Sportsbook</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">IBC Sports</a></li>
                        <li><a href="#">Sheba Sports</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Fishing</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Jili</a></li>
                        <li><a href="#">SPG</a></li>
                        <li><a href="#">King Maker</a></li>
                        <li><a href="#">SPRIBE</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Lottery</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Number</a></li>
                        <li><a href="#">Card</a></li>
                    </ul>
                </li>
                <hr>

                <li class="dropdown"><a href="category.html"><span>Crash</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Jili</a></li>
                        <li><a href="#">King Maker</a></li>
                        <li><a href="#">SPRIBE</a></li>
                    </ul>
                </li>
                <hr>

                <li><a href="about.html">VIP</a></li>
                <hr>
                <li><a href="{{ route('user.bajiChalenge') }}">Baji Challenge</a></li>
                <hr>
                <li><a href="" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><i
                            class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg></i> Logout</a></li>
                <hr>

            </ul>
        </nav><!-- .navbar -->

        <div class="nav-buttons">
            @auth
                <a href="{{ route('user.profile') }}" class="btn btn-outline-success btn-lg"><i
                        class="fa-regular fa-user"></i></a>
                <a class="btn text-white btn-lg px-1 px-md-5"><span style="font-size: 20px;"> Main Wallet: <span
                            style="font-size: 30px;">৳</span> {{ number_format(auth()->user()->wallet->balance, 2) }} </span></a>

                <a href="{{ route('user.deposit') }}" class="btn btn-warning btn-lg">Deposit</a>

                <a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                    class="btn btn-outline-warning btn-lg px-3 px-md-4">
                    Logout
                    <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                        @csrf
                    </form>
                </a>
            @else
                <button data-bs-toggle="modal" data-bs-target="#loginModal"
                    class="btn btn-warning btn-sm px-3 px-md-5">Login</button>
                <a href="{{ route('register') }}" class="btn btn-success btn-sm px-2 px-md-4">Register</a>
            @endauth

        </div>

        <div class="d-flex">
            <a href="" class="btn btn-outline-info btn-sm"><i class="fa-brands fa-android"></i></a>
            <a href="" class="btn btn-outline-info btn-sm"><i class="fa-regular fa-comment-dots"></i></a>
        </div>
    </div>
</header>
<div class="d-flex align-items-center justify-content-center fixed-bottom d-md-none"
    style="width:100%;background:#0f3cc9">
    @auth
        <a href="{{ url('/') }}" class="btn text-white btn-lg w-50"><i class="fa-solid fa-house"></i></a>
        <a href="{{ route('user.promotion') }}"
            class="btn btn-rounded text-white btn-lg w-50"><strong>Promotion</strong></a>
        <a href="{{ route('user.deposit') }}" class="btn btn-rounded text-white btn-lg w-50"><strong>Deposit</strong></a>
        <a href="{{ route('user.profile') }}" class="btn btn-lg text-white w-50"><i class="fa-regular fa-user"></i></a>
    @else
        <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-warning btn-lg w-50 ">Login</button>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg w-50 ">Register</a>
    @endauth
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: #0f3cc9">
                <h1 class="modal-title fs-5" id="loginModalLabel">Wlcome To Bajji</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Username or Phone Number</label>
                                <input id="identifier" class="form-control" name="identifier" type="text"
                                    placeholder="Username Or Phone Number" required>
                            </div>
                        </div>
                        <div class="col-lg-10 mt-3">
                            <div class="form-group">
                                <input id="password" class="form-control" name="password" placeholder="Password"
                                    type="password">
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="checkbox style3">
                            <input type="checkbox" id="test_1">
                            <label for="test_1">
                                Remember Me</a>
                            </label>
                        </div>
                    </div> --}}
                        <div class="col-lg-10 col-md-6 col-sm-6 col-6 text-end mb-20">
                            <a href="" class="link style1">Forgot Password?</a>
                        </div>
                        <input type="hidden" name="hr_login" value="0">
                        <div class="col-lg-10 mt-3">
                            <div class="form-group">
                                <button class="btn style1 w-100 d-block text-white" style="background: #0f3cc9">
                                    Login Now
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="my-3">Don't have an Account? <a class="link link-success"
                                    href="{{ route('register') }}">Create Account</a></p>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div> --}}
        </div>
    </div>
</div>
<div class="header-bottom d-flex align-items-center justify-content-center py-2">
    <nav id="navbar" class="navbar">
        <ul class="d-flex jus">
            <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i></a></li>
            <li><a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                    aria-controls="multiCollapseExample1"><span>Cricket</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
            </li>
            <li class="dropdown"><a href="category.html"><span>Live Casino</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Slot Games</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Table Games</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Sportsbook</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Fishing</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Lottery</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="category.html"><span>Crash</span> <i
                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                </ul>
            </li>

            <li><a href="{{ route('user.promotion') }}">Promotion</a></li>
            <li><a href="about.html">VIP</a></li>
            <li><a href="{{ route('user.bajiChalenge') }}">Baji Challenge</a></li>

        </ul>
    </nav><!-- .navbar -->

    <div class="position-relative">
        <a href="#" class="mx-2"></a>
        <a href="#" class="mx-2"></span></a>
        {{-- <a href="#" class="mx-2"><i class="fa-brands fa-telegram"></i></a> --}}

        <a href="#" class="mx-2 js-search-open"></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
            <form action="search-result.html" class="search-form">
                <span class="icon bi-search"></span>
                <input type="text" placeholder="Search" class="form-control">
                <button class="btn js-search-close"><span class="bi-x"></span></button>
            </form>
        </div><!-- End Search Form -->

    </div>

</div>
{{-- collapse areas --}}
<div class="collapse-area">
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <div class="container py-3">
                        <img src="{{ asset('frontend/assets/img/video-side.jpg') }}" width="100px" height="130px"
                            class="rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- collapse areas --}}
