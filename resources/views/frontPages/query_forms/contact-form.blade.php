@extends('layouts.static_page_base')
@section('title', ' Contact Us')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
    <!-- Hero Section -->
    <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url(img/about_us_bg.jpg);">
        <div class="container space-top-xl-3 py-6 py-xl-0">
            <div class="row justify-content-center py-xl-4">
                <!-- Info -->
                <div class="py-xl-10 py-5">
                    <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                        <li class="breadcrumb-item font-size-14"> <a class="text-white" href="{{url('/')}}">Home</a> </li>
                      </ol>
                    </nav>
                </div>
                <!-- End Info -->
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <div class="border-bottom border-color-8 pb-6 pb-lg-8 mb-5 mb-lg-7">
        <div class="container pb-1">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="mb-5 mb-lg-0 text-center text-md-left">
                        <h6 class="text-gray-3 font-weight-bold font-size-21">Phone No</h6>
                        <div class="mb-3 mb-md-5">
                            <p class="mb-1 text-gray-1">{{$contact->phone_number}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="mb-5 mb-lg-0 text-center text-md-left">
                        <h6 class="text-gray-3 font-weight-bold font-size-21">Email</h6>
                        <div class="mb-3 mb-md-5">
                            <p class="mb-1 text-gray-1">{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="text-center text-md-left">
                        <h6 class="text-gray-3 font-weight-bold font-size-21">Address</h6>
                        <div class="mb-3 mb-md-5">
                            <p class="mb-1 text-gray-1">{!! $contact->location !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom border-color-8 pb-6 pb-lg-9 mb-6 mb-lg-8">
        <div class="container mb-10">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-5 pb-xl-1">Send us a message</h2>
            </div>
            <div class="comment-section max-width-810 mx-auto">
                {{-- ====error message=== --}}
                @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $error }}
                    </div>
                  @endforeach
                @endif
                @if ($message = Session::get('error'))
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $message }}
                  </div>
                @endif
                {{-- ====error message=== --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ $message }}
                    </div>
                @endif
                <form class="js-validate" novalidate="novalidate" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <!-- Input -->
                        <div class="col-sm-6 mb-5">
                            <div class="js-form-message">
                                <input type="text" class="form-control alpha-only" minlength="2" name="name" placeholder="Name" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="col-sm-6 mb-5">
                            <div class="js-form-message">
                                <input type="text" class="form-control" required="" min="999999999" max="9999999999" name="phone" placeholder="Phone Number" >
                            </div>
                        </div>
                        <!-- End Input -->
                        <!-- Input -->
                        <div class="col-sm-12 mb-5">
                            <div class="js-form-message">
                                <input type="email" class="form-control email-validate" required="" name="email" placeholder="Email">
                            </div>
                        </div>
                        <!-- End Input -->
                        <div class="col-sm-12 mb-5">
                            <div class="js-form-message">
                                <div class="input-group">
                                    <textarea class="form-control" rows="6" cols="77" name="text" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- End Input -->
                        <div class="col d-flex justify-content-lg-start">
                            <button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white height-51 width-190 transition-3d-hover">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

@push('custom-styles')
<style type="text/css">
    .custom-control-label::before,.custom-control-label::after{
        width: 2em !important;
        height: 2em !important;
    }
</style>
@endpush
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('js/front/contact_us.js')}}"></script>
@endpush
@endsection