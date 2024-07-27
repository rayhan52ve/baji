@extends('frontend.layouts.master')
@section('content')
    <!-- ======= Hero Slider Section ======= -->
    <style>
        @media (min-width: 967px) {
            #hero-slider .swiper-slide {
                margin-top: 5px;

            }

            .img-bg {
                height: 50vh !important;
            }
        }
    </style>
    <section id="hero-slider" class="hero-slider mt-0 mt-lg-5 pt-0 pt-lg-5">
        <div class="mt-2" data-aos="fade-in">
            <div class="row">
                <div class="col-12 ">
                    <div class="swiper sliderFeaturedPosts">
                        @php
                            $banners = \App\Models\Banner::get();
                        @endphp
                        <div class="swiper-wrapper">
                            @foreach ($banners as $item)
                                <div class="swiper-slide">
                                    <a href="single-post.html" class="img-bg d-flex align-items-end"
                                        style="background-image: url('{{ $item->image1 }}');background-size: cover; background-position: center; height: 20vh;">
                                        <div class="img-bg-inner">
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <div id="carouselExampleControls" class="carousel carousel-dark slide d-lg-none m-0 p-0">
        <div class="carousel-inner">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="carousel-item active">
                        <div class="card-wrapper container-sm d-flex justify-content-around">
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-1.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-2.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-3.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-wrapper container-sm d-flex justify-content-around">
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-4.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-5.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-6.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-wrapper container-sm d-flex justify-content-around">
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-7.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-8.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card" style="width: 12rem;height: 115px;">
                                <div class="card-body align-items-center">
                                    <img src="{{ asset('assets/button/btn-9.png') }}" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                <i class="fa-solid fa-caret-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                <i class="fa-solid fa-caret-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12 ">
                    @auth
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card h-100" style="background: #0f3cc9">
                                    <div class="card-header text-white text-center" style="background: rgb(202, 67, 18);">
                                        <h2 class="mb-0">Referral Program</h2>
                                        <p class="mt-2 mb-0" style="font-size: 13px">
                                            EXTRA ৳ <strong class="text-dark">9,99,999</strong> WEEKLY COMMISSION + FREE
                                            UNLIMITED ৳ <strong class="text-dark">1000 + 102%</strong> LIFETIME COMMISSION.
                                        </p>
                                    </div>
                                    <div class="card-body text-center text-white">
                                        <h5 class="mt-0">Referral Code</h5>
                                        <div class="input-group justify-content-center mb-3">
                                            <input id="referralCodeInput" type="text"
                                                class="form-control text-center font-weight-bold"
                                                value="{{ auth()->user()->referral ?? null }}" readonly>
                                            <button class="btn btn-primary" type="button"
                                                onclick="copyReferralCode()">Copy</button>
                                        </div>
                                        <h5>Total Commission</h5>
                                        <div class="input-group justify-content-center">
                                            <input type="text" class="form-control text-center font-weight-bold"
                                                value="{{ auth()->user()->customerCommission()->sum('amount') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <a href="#" class="btn mt-2 w-50 text-white" style="background: rgb(202, 67, 18);"><i
                                                class="fa-solid fa-share-nodes"></i> Share Now</a>
                                        <a href="#" class="btn mt-2 w-50 text-white" style="background: rgb(202, 67, 18);">Referral Report</a>
                                    </div>
                                </div>
                            </div>

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

                            <div class="col-md-6 d-none">
                                <img src="{{ asset('assets/sidebanner.jpeg') }}" width="100%" height="300px"
                                    alt="">
                            </div>

                        </div>
                    </div>
                @else
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="col-md-6">
                                    <img src="{{ asset('frontend/assets/img/refer_desktop.jpg') }}" width="100%" height="auto"
                                        alt="">
                                </div>
                            </div>


                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                @endauth
            </div>
        </div>
    </section>


    <!-- ======= Post Grid Section ======= -->
    <div class="p-0 m-0">
        <div class="" data-aos="fade-up">
            <div class="row">
                <div class="col-md-7">
                    <div class="rev_slider_wrapper fullscreen-container" data-alias="agency-website"
                        id="rev_slider_280_1_wrapper">
                        <!-- START REVOLUTION SLIDER 5.1.4 fullscreen mode -->
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/INCowJHpVsk?">
                        </iframe>
                    </div>
                    <!-- END REVOLUTION SLIDER -->
                </div>
                <!--end item-->

                {{-- <div class="col-md-5 pt-0">
                    <img src="{{ asset('frontend/assets/img/video-side.jpg') }}" width="100%" height="auto"
                        alt="">
                </div> --}}

            </div> <!-- End .row -->
        </div>
    </div> <!-- End Post Grid Section -->
@endsection
