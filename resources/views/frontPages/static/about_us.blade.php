@extends('layouts.static_page_base')
@section('title', ' About Us')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
    <!-- Hero Section -->
    <div class="bg-img-hero text-center mb-1" style="background-image: url(img/bg-tour-1_blue.jpg);">
        <div class="container space-top-xl-3 py-6 py-xl-0">
            <div class="row justify-content-center py-xl-4">
                <!-- Info -->
                <div class="py-xl-10 py-5">
                    <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">About Us</h1>
                </div>
                <!-- End Info -->
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <!-- Slider -->
    <div class="slider border-bottom border-color-3">
        <div class="container space-1">
            <div class="w-md-80 w-lg-70 text-center mx-md-auto mb-5 mt-3">
                <h2 class="section-title text-black font-size-xs-28 font-weight-bold mb-0">We’re truely dedicated to make your travel experience as much simple and fun as possible!</h2>
             </div>
             <section class="w-lg-80 mx-auto mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="font-size-21 font-weight-bold text-center text-md-left ">Our Story</h2>
                        <p class="text-gray-1">Get ready to discover the best of Florida with us! We are determined to make sure you have the best holiday of your lives. As a team, our priority is to find a tailor made flight, hotel, car hire and attraction combination for you, that suits all your needs without costing a fortune – actually can be much more budget friendly than you have ever imagined. As our tagline suggests, we love everything about Florida.</p>
                    </div><!-- /.col -->

                    <div class="col-md-6">
                        <h2 class="font-size-21 font-weight-bold text-center text-md-left ">Our mission</h2>
                        <p class="text-gray-1">We take great pride in our customer service, aiming to provide an outstanding quality of service, value for money and try hard to make each and every customer a lifelong one. Whether it’s fun filled holidays to Walt Disney World, a value for money Villa holiday in Kissimmee or that super luxury holiday you have always wanted, we have it all in Florida Calling.</p>
                    </div><!-- /.col -->

                </div><!-- ./row -->
            </section>
            {{-- <div class="js-slick-carousel u-slick pb-2"
                 data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-9"
                 data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-9"
                 data-pagi-classes="text-center u-slick__pagination mt-5">
                 @foreach($sliderInfo as $val)
                    @if($val->type==1)
                    <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(uploads/{{$val->image}});">
                        <div class="space-5">
                        </div>
                    </div>
                    @endif
                @endforeach
            </div> --}}
         </div>
     </div>
    <!-- End Slider -->
    <!-- Features Section -->
    @include('frontPages.includes.why_choose_us')
    
</main>
<!-- ========== END MAIN CONTENT ========== -->

@endsection
