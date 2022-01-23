@extends('layouts.static_page_base')
@section('title', 'Privacy Policy')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
<!-- Hero Section -->
<div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url(img/bg-tour-1_blue.jpg);">
    <div class="container space-top-xl-3 py-6 py-xl-0">
        <div class="row justify-content-center py-xl-4">
            <!-- Info -->
            <div class="py-xl-10 py-5">
                <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">Privacy Policy</h1>
            </div>
            <!-- End Info -->
        </div>
    </div>
</div>
<!--End Hero Section -->
<div class=" terms_tab border-bottom border-color-8 pt-lg-1">
    <div class="container mb-4 mb-lg-11 pb-lg-1">
        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3">
                <div class="py-4 border border-color-7 rounded-xs mb-4 mb-md-0">
                    <h6 class="text-gray-6 font-weight-bold font-size-17 px-4 ml-xl-1 mt-xl-1 mb-4 pb-1">Navigation</h6>
                    <!-- Tab Wrapper -->
                    <div class="tab-wrapper shadow-none">
                        <ul class="nav flex-column mb-0 tab-nav-list" id="pills-tab" role="tablist">
                            @foreach($staticPage as $key=>$value)
                            <li class="nav-item mx-0 mb-2 pb-1">
                                <a class="nav-link px-4 d-flex align-items-center @if($key==0) active @endif" id="pills-one-example{{$key}}-tab" data-toggle="pill" href="#pills-one-example{{$key}}" role="tab" aria-controls="pills-one-example{{$key}}" aria-selected="true">
                                    <i class="fas fa-chevron-right font-size-12 mr-1 text-gray-3"></i>
                                    <span class="font-weight-normal ml-1 text-gray-1">{{$value->title ?? ''}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- Tab Content -->
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="tab-content" id="pills-tabContent">
                    @foreach($staticPage as $key=>$value)
                    <div class="tab-pane fade show @if($key==0) active @endif" id="pills-one-example{{$key}}" role="tabpanel" aria-labelledby="pills-one-example{{$key}}-tab">
                        <h4 class="text-size-21 font-weight-semi-bold text-gray-3 mb-3 pb-1">{{$value->title}}</h4>
                        <p class="text-lh-lg text-gray-1">{!! $value->description !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<!-- ========== FOOTER ========== -->

@endsection
