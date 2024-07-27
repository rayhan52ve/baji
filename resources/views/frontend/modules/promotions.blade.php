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
    <div id="hero-slider" class="hero-slider mt-0 mt-lg-5 pt-0 pt-lg-5">
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
    </div><!-- End Hero Slider Section -->
    <div class="marquee">
        <i class="fas fa-bullhorn fa-lg"></i>
        <marquee behavior="scroll" direction="left">Welcome To Baji Online Casino. Welcome To Baji Online Casino. Welcome To Baji Online Casino.</marquee>
      </div>
      <style>
        .marquee {
          display: flex;
          align-items: center;
          padding: 10px;
          background-color: #343a40;
          color: white;
          overflow: hidden;
        }

        .marquee i {
          margin-right: 10px; /* Adjust as needed */
        }
      </style>
    {{-- <style>
        .shadow {
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
            /* You can adjust the shadow properties as needed */
        }
    </style> --}}
    <div id="hero-slider" class="hero-slider mt-0 pt-0">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-md-6 m-0 p-0 shadow">
                            <img src="{{ asset('assets/promotion/p1.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0 mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p2.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0  mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p3.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0  mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p4.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0 mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p5.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0 mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p6.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0 mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p7.png') }}" width="100%" height="200px" alt="">
                        </div>

                        <div class="col-md-6 p-0 mt-2 shadow">
                            <img src="{{ asset('assets/promotion/p8.png') }}" width="100%" height="200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End Hero Slider Section -->


    {{-- <div style="margin:500px"></div> --}}
@endsection
