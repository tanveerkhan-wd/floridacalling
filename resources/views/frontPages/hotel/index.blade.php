@extends('layouts.subPageBase')
@section('title', ' Hotel Listing')
@section('content')
@php
    $hType = Config::get('constant.hotel_type');
@endphp
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="container pt-5 pt-xl-8">
        <div class="row mb-5 mb-md-8 mt-xl-1 pb-md-1">
            <div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
                <div class="navbar-expand-lg navbar-expand-lg-collapse-block">
                    <button class="btn d-lg-none mb-5 p-0 collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
                        <span class="text-primary ml-2">Sidebar</span>
                    </button>
                    <div id="sidebar" class="collapse navbar-collapse">
                        <div class="mb-6 w-100">
                            <div class="pb-4 mb-2">
                                <div class="sidebar border border-color-1 rounded-xs">
                                    <div class="p-4 mx-1 mb-1">
                                        <!-- Input -->
                                        <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Location</span>
                                        <div class="mb-4">
                                            <div class="input-group border-bottom border-width-2 border-color-1">
                                                <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                              <input type="text" id="destination" value="@if(request()->has('location')){{request()->location}}@endif" class="form-control font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0" placeholder="Where are you going?" aria-label="Keyword or title" aria-describedby="keywordInputAddon">
                                            </div>
                                        </div>
                                        <!-- End Input -->
                                        <!-- Input -->
                                        
                                        <div class="col dropdown-custom px-0 mb-5">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-2">Trip Type</span>
                                            <div class="flex-horizontal-center border-bottom border-width-2 border-color-1 pb-2">
                                                <i class="flaticon-backpack d-flex align-items-center mr-2 font-size-24 text-primary"></i>
                                                <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav" id="select_type" 
                                                    data-style="btn-sm mt-1 py-0 px-0  text-black font-size-16 font-weight-semi-bold d-flex align-items-center">
                                                    <option value="">Select</option>
                                                    @foreach($hType as $kii=>$val)
                                                        <option value="{{$kii}}" @if(request()->has('type') && request()->type==$val) selected="" @endif>{{$val}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="pb-4 mb-2">
                                <a href="https://goo.gl/maps/kCVqYkjHX3XvoC4B9" class="d-block border border-color-1 rounded-xs">
                                    <img src="../../assets/img/map-markers/map.jpg" alt="" width="100%">
                                </a>
                            </div> --}}

                            <div class="sidenav border border-color-8 rounded-xs">
                                <!-- Accordiaon -->
                                <div id="shopRatingAccordion" class="accordion rounded-0 shadow-none border-bottom">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopRatingOne" aria-expanded="false" aria-controls="shopRatingOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark text-lh-1dot4">Star Ratings</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopRatingOne" class="collapse show" aria-labelledby="shopCategoryHeadingOne" data-parent="#shopRatingAccordion">
                                            <div class="card-body pt-0 mt-1 px-5">
                                                <!-- Checkboxes -->
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="star_rating_filter[]" value="5" id="five_star">
                                                        <label class="custom-control-label text-lh-inherit text-color-1" for="five_star">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                       <input type="checkbox" class="custom-control-input"  name="star_rating_filter[]" value="4" id="four_star">
                                                       <label class="custom-control-label text-lh-inherit text-color-1" for="four_star">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                       </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="three_star" name="star_rating_filter[]" value="3">
                                                      <label class="custom-control-label text-lh-inherit text-color-1" for="three_star">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                      </label>
                                                    </div>
                                                </div>
                                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="two_star" name="star_rating_filter[]" value="2">
                                                      <label class="custom-control-label text-lh-inherit text-color-1" for="two_star">
                                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="shopCartAccordion" class="accordion rounded shadow-none">
                                    <div class="border-0">
                                        <div class="card-collapse" id="shopCardHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCardOne" aria-expanded="false" aria-controls="shopCardOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price Range (£)</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                                            <div class="card-body pt-0 px-5">
                                                <div class="pb-3 mb-1 d-flex text-lh-1">
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                                    <span class="mx-0dot5"> — </span>
                                                    <span>£</span>
                                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                                </div>
                                                <input class="js-range-slider" id="price_range" type="text"
                                                data-extra-classes="u-range-slider height-35"
                                                data-type="double"
                                                data-grid="false"
                                                data-hide-from-to="true"
                                                data-min="0"
                                                data-max="20000"
                                                data-from="0"
                                                data-to="10000"
                                                data-prefix="$"
                                                data-result-min="#rangeSliderExample3MinResult"
                                                data-result-max="#rangeSliderExample3MaxResult">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->
                                <div id="cityCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                                    <div class="border-0">
                                        <div class="card-collapse" id="cityCategoryHeadingOne">
                                            <h3 class="mb-0">
                                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#cityCategoryOne" aria-expanded="false" aria-controls="cityCategoryOne">
                                                    <span class="row align-items-center">
                                                        <span class="col-9">
                                                            <span class="font-weight-bold font-size-17 text-dark mb-3">City</span>
                                                        </span>
                                                        <span class="col-3 text-right">
                                                            <span class="card-btn-arrow">
                                                                <span class="fas fa-chevron-down small"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="cityCategoryOne" class="collapse show" aria-labelledby="cityCategoryHeadingOne" data-parent="#cityCategoryAccordion">
                                            <div class="card-body pt-0 mt-1 px-5 pb-4 cityWthCnt">
                                                {{-- @foreach($all_city as $key => $value)
                                                    @if($key < 4)
                                                    <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="brandamsterdam{{$key}}" name="location_ids[]" value="{{$value['id']}}">
                                                            <label class="custom-control-label" for="brandamsterdam{{$key}}">{{$value['name']}}</label>
                                                        </div>
                                                        <span>{{$value['countItem'] ?? '0'}}</span>
                                                    </div>
                                                    @endif
                                                @endforeach --}}
                                                <!-- End Checkboxes -->

                                                <!-- View More - Collapse -->
                                                <div class="collapse cityWthCnt1" id="collapseBrand3">
                                                    {{-- @foreach($all_city as $key => $value)
                                                    @if($key >= 4)
                                                    <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="gucci{{$key}}" name="location_ids[]" value="{{$value['id']}}">
                                                        <label class="custom-control-label" for="gucci{{$key}}">{{$value['name']}}</label>
                                                        </div>
                                                        <span>{{$value['countItem']}}</span>
                                                    </div>
                                                    @endif
                                                    @endforeach --}}
                                                </div>
                                                <!-- End View More - Collapse -->

                                                <!-- Link -->
                                                <a class="link link-collapse small font-size-1 mt-2" data-toggle="collapse" href="#collapseBrand3" role="button" aria-expanded="false" aria-controls="collapseBrand3">
                                                  <span class="link-collapse__default font-size-14">Show all {{count($all_city)}}</span>
                                                  <span class="link-collapse__active font-size-14">Show less</span>
                                                </a>
                                                <!-- End Link -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->
                            </div>
                            <br><br>
                            <div class="border border-color-7 rounded p-4 mb-5 text-center text-white" style="background-color: #9ac854;">
                                <div class="">
                                    <span class="font-size-20 text-white font-weight-bold">Best Price Guaranteed</span>
                                </div>
                                <p class="text-white">Call to book any holiday</p>
                                <a href="tel:{{ $contact->phone_number ?? '' }}" class="p-2 align-items-center badge badge-pill bg-white transition-3d-hover font-size-19 font-weight-bold py-1" style="color:#9ac854;"><i class="flaticon-call font-size-25 mr-1"></i> {{ $contact->phone_number ?? '' }}</a>
                                <br><br>
                                {{-- <a href="mailto:{{ $contact->email ?? '' }}" class="align-items-center border badge badge-pill transition-3d-hover font-size-14 py-1 contact-email-btn text-white" style="background-color:#9ac854;"><i class="flaticon-envelope font-size-25 mr-1"></i> Enquire by email</a> --}}
                                
                            </div>
                            @include('frontPages.includes.why_book_with_us')

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 order-md-1 order-lg-2">
                <!-- Shop-control-bar Title -->
                <h2 class="font-size-34 font-weight-bold mb-0 text-lh-1 location_header">@if(request()->has('location')) {{request()->location}} @else  @endif</h2>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="font-size-18 mb-0 text-lh-1 tours_found">Contact us to get more information</h3>
                    <ul class="nav tab-nav-shop flex-nowrap" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-size-22 p-0 active" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                <div class="d-md-flex justify-content-md-center align-items-md-center" style="display:none !important;">
                                    <i class="fa fa-list"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-size-22 p-0 ml-2" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                <div class="d-md-flex justify-content-md-center align-items-md-center" style="display:none !important;">
                                    <i class="fa fa-th"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End shop-control-bar Title -->

                <!-- Slick Tab carousel -->
                <div class="u-slick__tab">
                    <!-- Nav Links -->
                    <div class="mb-5 row">
                        <ul class="nav px-3 w-100 border-radius-3 {{-- tab-nav --}} align-items-center d-flex px-0 hl-filter" role="tablist">
                            <div class="col-12 col-md-4 p-0">
                                <li class="nav-item d-flex align-items-center border">
                                    <a href="javascript::void(0)" class="nav-link font-weight-normal text-gray-1 font-size-15 getRecommend">
                                        <div class="btn_check">
                                          <input type="checkbox" name="recommended" id="recommended" value="">
                                          <label class="" for="recommended">
                                             Recommended Destination
                                          </label>
                                        </div>
                                    </a>
                                </li>    
                            </div>
                            <div class="col-5 col-md-2 p-0">
                                <li class="nav-item align-items-center border">
                                    <select class="selectpicker bootstrap-select__custom-nav dropdown-select w-auto" id="ztoanatoz" data-style="btn-sm font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                      <option value="ASC">A-Z</option>
                                      <option value="DESC">Z-A</option>
                                    </select>
                                </li>    
                            </div>
                            <div class="col-7 col-md-3 p-0">
                                <li class="nav-item d-flex align-items-center flex-shrink-0 flex-xl-shrink-1 border">
                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" id="sort_star_rating" data-style="btn-sm font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                      <option value="">Tripadvisor Rating</option>
                                      <option value="5">5 Star</option>
                                      <option value="4">4 Star</option>
                                      <option value="3">3 Star</option>
                                      <option value="2">2 Star</option>
                                    </select>
                                </li>    
                            </div>
                            <div class="col-8 col-md-2 p-0">
                                <li class="nav-item align-items-center border">
                                    <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav w-auto" id="sort_price" data-style="btn-sm font-weight-normal font-size-15  text-gray-1 d-flex align-items-center">
                                      <option value="">Price</option>
                                      <option value="ASC">Price Low - High</option>
                                      <option value="DESC">Price High - Low</option>
                                    </select>
                                </li>    
                            </div>
                            <div class="col-4 col-md-1 p-0">
                                <li class="nav-item align-items-center text-center border" style="padding:9px;">
                                    <a href="{{route('front.hotel.listing')}}"><img src="{{asset('img/ic_reset.png')}}" alt="refresh button" style="height:26px;"></a>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <!-- End Nav Links -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view">
                                
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <div class="row product-grid-view">
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- Slick Tab carousel -->
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
@push('custom-styles')
    <style type="text/css">
        /*.u-slick.slick-initialized .js-next, .u-slick.slick-initialized .js-prev{background: #5658569e;font-weight: bold;}*/
        .u-slick.slick-initialized .js-next:hover, .u-slick.slick-initialized .js-prev:hover{background: #565856ed;font-weight: bold;}
        .form-control{height: calc(1.5em + 1.0rem + 3px)};
        .dropdown-toggle::after{margin-left: 0px!important;}
    </style>
@endpush
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('js/front_custom.js')}}"></script>
@endpush

@endsection

