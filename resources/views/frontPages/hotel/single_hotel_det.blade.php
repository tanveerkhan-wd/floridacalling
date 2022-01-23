@extends('layouts.subPageBase')
@section('title', ' Hotel Details')
@section('content')
    @php
        $taRatingMaster = $getData->ratingMaster!=null || !empty($getData->ratingMaster)?$getData->ratingMaster:false;
        $hotel_rating = $getData->hotel_rating!=null || !empty($getData->hotel_rating) ?$getData->hotel_rating :false;
    @endphp
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Breadcrumb -->
        <div class="border-bottom mb-7">
            <div class="container">
                <nav class="py-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('front.hotel.listing')}}">{{Config::get('constant.hotel_type')[$getData->type]}}</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$getData->full_location_with_arrow}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-block d-md-flex flex-center-between align-items-start mb-3">
                        <div class="mb-1">
                            <div class="mb-2 mb-md-0">
                                <h4 class="font-size-23 font-weight-bold mb-1 mr-3">{{ $getData->name }}</h4>
                            </div>
                            <div class="mb-2 mb-md-0">
                                <span class="green-lighter ml-1">
                                    @if(isset($getData->ta_rating->rating))
                                    @for($i=0; $i<round($getData->ta_rating->rating); $i++)
                                    <small class="fas fa-star"></small>
                                    @endfor
                                    @endif
                                </span>
                                <span class="green-lighter ml-1">
                                    @if(isset($getData->ta_rating->rating))
                                    @for($i=0; $i<5-round($getData->ta_rating->rating); $i++)
                                    <small class="fas fa-star"></small>
                                    @endfor
                                    @endif
                                </span>

                                @if($getData->hot_deal)
                                    <a class="ml-5 badge badge-pill bg-badge text-black px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1">Recommended</a>
                                @endif
                                
                                @if($getData->type)
                                    <span class="badge badge-pill bg-badge text-black px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ml-2">{{Config::get('constant.hotel_type')[$getData->type]}}</span>
                                @endif
                            </div>
                            <div class="d-block  flex-horizontal-center">
                                <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1 mb-2 mb-xl-0">
                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{ $getData->full_location }}
                                </div>
                                <div class="mb-2 mb-md-0 flex-horizontal-center">
                                    <div class="font-size-10 letter-spacing-2">
                                        <span class="">
                                            @if($getData->ta_rating->image != null)
                                            <img src="{{asset('img/taowl.png')}}">
                                            <img src="{{asset('uploads/'.$getData->ta_rating->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                            @endif
                                        </span>
                                    </div>
                                    <a href="#scroll-reviews" class="text-secondary font-size-14 text-gray-1 ml-2">(@if($taRatingMaster){{ number_format($getData->ratingMaster->total_review) ?? '' }}@endif Reviews)</a>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-borderless list-group-horizontal custom-social-share">
                            {{-- <li class="list-group-item px-1">
                                <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                    <i class="flaticon-like font-size-18 text-dark"></i>
                                </a>
                            </li> --}}
                            {{-- <li class="list-group-item px-1">
                                <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                                    <i class="flaticon-share font-size-18 text-dark"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="py-2 mb-4">
                        <ul class="mb-4 list-group list-group-borderless list-group-horizontal row">
                            @foreach($getData->facility_data as $key=>$faci)
                            @if($key <=6)
                            <li class="col-md-3 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                @if($faci->icon)
                                    <img src="{{ asset('uploads/thumbnail/40x40/'.$faci->icon) }}" style="max-width: 48px;max-height: 39px;">
                                @else
                                    <img src="{{ asset('img/no_image.png') }}" style="max-width: 48px;max-height: 39px;">
                                @endif
                                <div class="ml-1 text-gray-1">{{ $faci->name }}</div>
                            </li>
                            @endif
                            @endforeach
                            <li class="text-center col-md-3 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <div class="ml-1 text-gray-1" id="more-aminity">More...</div>
                            </li>
                            {{-- <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <i class="flaticon-social text-primary font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">Max People : 26</div>
                            </li>
                            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <i class="flaticon-wifi-signal text-primary font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">Wifi Available</div>
                            </li>
                            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <i class="flaticon-month text-primary font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">Jan 18’ - Dec 21'</div>
                            </li>
                            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <i class="flaticon-user-2 text-primary font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">Min Age : 10+</div>
                            </li>
                            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2">
                                <i class="flaticon-pin text-primary font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">Pickup: Airpot</div>
                            </li> --}}
                        </ul>
                        <div class="position-relative">
                            <!-- Images Carousel -->
                            <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                data-infinite="true"
                                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                data-nav-for="#sliderSyncingThumb">
                                @php
                                    $images = !empty($getData->hotel_det->images) ? json_decode($getData->hotel_det->images):[];
                                @endphp
                                @forelse($images as $singleImage)
                                <div class="js-slide">
                                    <img class="img-fluid border-radius-3" src="{{asset('uploads/'.$singleImage)}}" alt="Image Description" style="width: 100%;max-height:450px;">
                                </div>
                                @endforeach
                            </div>
                            <div class="position-absolute right-0 mr-3 mt-md-n11 mt-n9">
                                <div class="flex-horizontal-center">
                                    <!-- Video -->
                                    {{-- <a class="js-fancybox btn btn-white transition-3d-hover py-2 px-md-5 px-3 shadow-6 mr-1" href="javascript:;"
                                        data-src="//www.youtube.com/watch?v=Vfk5VuUpJ-o"
                                        data-speed="700">
                                        <i class="flaticon-movie mr-md-2 font-size-18 text-primary"></i><span class="d-none d-md-inline">Video</span>
                                    </a> --}}
                                    <!-- End Video -->

                                    <a class="js-fancybox btn btn-white transition-3d-hover ml-2 py-2 px-md-5 px-3 shadow-6" href="javascript:;"
                                        data-src="@if($images){{asset('uploads/'.$images[0])}}@endif"
                                        data-fancybox="fancyboxGallery6"
                                        data-speed="700">
                                        <i class="flaticon-gallery mr-md-2 font-size-18 text-primary"></i><span class="d-none d-md-inline">Gallery</span>
                                    </a>
                                    @forelse($images as $singleImage)
                                    <div class="js-slide">
                                        <img class="js-fancybox d-none" alt="Image Description"
                                        data-fancybox="fancyboxGallery6"
                                        data-src="{{asset('uploads/'.$singleImage)}}"
                                        data-speed="700">
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--gutters-4 u-slick--transform-off"
                                data-infinite="true"
                                data-slides-show="6"
                                data-is-thumbs="true"
                                data-nav-for="#sliderSyncingNav"
                                data-responsive='[{
                                    "breakpoint": 992,
                                    "settings": {
                                        "slidesToShow": 4
                                    }
                                }, {
                                    "breakpoint": 768,
                                    "settings": {
                                        "slidesToShow": 3
                                    }
                                }, {
                                    "breakpoint": 554,
                                    "settings": {
                                        "slidesToShow": 2
                                    }
                                }]'>
                                @forelse($images as $singleImage)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid border-radius-3 height-110" src="{{asset('uploads/'.$singleImage)}}" alt="Image Description">
                                </div>
                                @endforeach
                            </div>
                            <!-- End Images Carousel -->
                        </div>
                    </div>
                    <div id="stickyBlockStartPoint" class="mb-4">
                        <div class="border rounded-pill js-sticky-block p-1 border-width-2 z-index-4 bg-white"
                            data-parent="#stickyBlockStartPoint"
                            data-offset-target="#logoAndNav"
                            data-sticky-view="lg"
                            data-start-point="#stickyBlockStartPoint"
                            data-end-point="#stickyBlockEndPoint"
                            data-offset-top="30"
                            data-offset-bottom="30">
                            <ul class="js-scroll-nav nav tab-nav-pill flex-nowrap tab-nav">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-description">
                                        <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Description</span>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-location">
                                        <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Map</span>
                                        </div>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium" href="#scroll-reviews">
                                        <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Reviews</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium scroll-aminities" href="#scroll-aminities">
                                        <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                            <span class="tabtext font-weight-semi-bold">Amenities</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-bottom position-relative">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            Description
                        </h5>
                        <p class="mb-4">{{ $getData->hotel_det->description }}</p>
                    </div>
                    <div class="border-bottom py-4">
                        <h5 id="scroll-location" class="font-size-21 font-weight-bold text-dark mb-4">
                            Location
                        </h5>
                        {{-- <div id="map" class="map"></div> --}}
                    </div>
                    <div class="border-bottom py-4">
                        <h5 id="scroll-reviews" class="font-size-21 font-weight-bold text-dark mb-4">
                            Average Reviews
                        </h5>
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="border rounded flex-content-center py-3 border-width-2">
                                    <div class="text-center">
                                        <h2 class="font-size-50 font-weight-bold mb-0 text-lh-sm" style="color: #06aa6c;">
                                            {{ $getData->ta_rating->rating }}<span class="font-size-20">/5</span>
                                        </h2>
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ta_rating->image)}}" style="width: 90px;height: 19px;">
                                        <div class="font-size-25 text-dark mb-2">
                                            
                                            @if($getData->ta_rating->rating >=4)
                                            {{'Excellent'}}
                                            @elseif($getData->ta_rating->rating ==3.5)
                                            {{'Very Good'}}
                                            @elseif($getData->ta_rating->rating >=3)
                                            {{'Average'}}
                                            @elseif($getData->ta_rating->rating ==2 && $getData->ta_rating->rating == 2.5)
                                            {{'Poor'}}
                                            @else 
                                            {{'Terrible'}}
                                            @endif

                                        </div>
                                        <div class="text-gray-1">From @if($taRatingMaster){{ number_format($getData->ratingMaster->total_review) ?? '' }} @endif reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                            
                                @if($taRatingMaster)
                                <div class="row">
                                    @php
                                        $ratingMaster = $getData->ratingMaster;
                                        function getPercenrtage($rating,$ratingMaster)
                                        {
                                            $rev = isset($ratingMaster->total_review) ? $ratingMaster->total_review:0;
                                            $rating = $rating*100 / $rev;
                                            return $rating;
                                        }
                                        $excellent = $getData->ratingMaster->excellent;
                                        $width_exel = 'width: ' . getPercenrtage($excellent,$ratingMaster) . '%;';
                                        
                                        $very_good = $getData->ratingMaster->very_good;
                                        $width_vg = 'width: ' . getPercenrtage($very_good,$ratingMaster) . '%;';

                                        $average = $getData->ratingMaster->average;
                                        $width_avg = 'width: ' . getPercenrtage($average,$ratingMaster) . '%;';
                                        
                                        $poor = $getData->ratingMaster->poor;
                                        $width_poor = 'width: ' . getPercenrtage($poor,$ratingMaster) . '%;';

                                        $terrible = $getData->ratingMaster->terrible;
                                        $width_terrible = 'width: ' . getPercenrtage($terrible,$ratingMaster) . '%;';

                                    @endphp
                                    <div class="col-md-12 mb-3 align-items-center">
                                        <div class="flex-horizontal-center mr-6">
                                            <h6 class="font-weight-bold text-gray-1 m-0 mr-2 w-30">
                                                Excellent
                                            </h6>
                                            <div class="progress bg-gray-33  w-100" style="height: 17px;">
                                                <div class="progress-bar " role="progressbar" style="{{$width_exel}}" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-gray-1">
                                                {{ number_format($excellent) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="flex-horizontal-center mr-6">
                                            <h6 class="font-weight-bold text-gray-1 m-0 mr-2 w-30">
                                                Very Good
                                            </h6>
                                            <div class="progress bg-gray-33  w-100" style="height: 17px;">
                                                <div class="progress-bar " role="progressbar" style="{{ $width_vg  }}" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-gray-1">
                                                {{ number_format($very_good) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="flex-horizontal-center mr-6">
                                            <h6 class="font-weight-bold text-gray-1 m-0 mr-2 w-30">
                                                Average
                                            </h6>
                                            <div class="progress bg-gray-33  w-100" style="height: 17px;">
                                                <div class="progress-bar " role="progressbar" style="{{ $width_avg }}" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-gray-1">
                                                {{ number_format($average) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="flex-horizontal-center mr-6">
                                            <h6 class="font-weight-bold text-gray-1 m-0 mr-2 w-30">
                                                Poor
                                            </h6>
                                            <div class="progress bg-gray-33  w-100" style="height: 17px;">
                                                <div class="progress-bar " role="progressbar" style="{{$width_poor}}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-gray-1">
                                                {{ number_format($poor)}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="flex-horizontal-center mr-6">
                                            <h6 class="font-weight-bold text-gray-1 m-0 mr-2 w-30">
                                                Terrible
                                            </h6>
                                            <div class="progress bg-gray-33  w-100" style="height: 13px;">
                                                <div class="progress-bar " role="progressbar" style="{{ $width_terrible  }}" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-gray-1">
                                                {{ number_format($terrible) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom py-4">
                        <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                            Review
                        </h5>
                        <div class="row">
                            <div class="col-md-4 mb-6">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    Cleanliness
                                </h6>
                                <span class="">
                                    @if(isset($getData->ratingMaster) && isset($getData->ratingMaster->fcleanliness) && $getData->ratingMaster->fcleanliness != null)
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ratingMaster->fcleanliness->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-4 mb-6">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    Rooms Facilities
                                </h6>
                                <span class="">
                                    @if(isset($getData->ratingMaster) && isset($getData->ratingMaster->frooms) && $getData->ratingMaster->frooms != null)
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ratingMaster->frooms->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-4 mb-6">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    Value for money
                                </h6>
                                <span class="">
                                    @if(isset($getData->ratingMaster) && isset($getData->ratingMaster->fvalue) && $getData->ratingMaster->fvalue != null)
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ratingMaster->fvalue->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-4 mb-6">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    Service
                                </h6>
                                <span class="">
                                    @if(isset($getData->ratingMaster) && isset($getData->ratingMaster->fservice) && $getData->ratingMaster->fservice != null)
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ratingMaster->fservice->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-4 mb-6">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    Location
                                </h6>
                                <span class="">
                                    @if(isset($getData->ratingMaster) && isset($getData->ratingMaster->flocation) && $getData->ratingMaster->flocation != null)
                                        <img src="{{asset('img/taowl.png')}}">
                                        <img src="{{asset('uploads/'.$getData->ratingMaster->flocation->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                    @endif
                                </span>
                            </div>
                        </div>
                    
                    </div>
                    <div class="border-bottom py-4">
                        <h5 id="scroll-aminities" class="font-size-21 font-weight-bold text-dark mb-6">
                            Amenities
                        </h5>
                        <div class="row">
                            @foreach($getData->facility_data as $key=>$faci)
                            <li class="col-md-4 flex-horizontal-center text-lh-sm mb-2">
                                <i class="fa fa-check text-success font-size-22 mr-2 d-block"></i>
                                <div class="ml-1 text-gray-1">{{$faci->name}}</div>
                            </li>
                            @endforeach
                        </div>
                        <div id="stickyBlockEndPoint"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3">
                    <div class="mb-4">
                        {{-- <div class="border border-color-7 rounded mb-5">
                            <div class="border-bottom">
                                <div class="p-4">
                                    <span class="font-size-14">From</span>
                                    <span class="font-size-24 text-gray-6 font-weight-bold ml-1">£{{ $getData->price }}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">Date</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1">
                                        <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                            @php
                                                $currentDate = date('M/d/Y');
                                            @endphp
                                            <input class="js-range-datepicker w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0" type="text" placeholder="{{$currentDate}}" aria-label="July 7/2019"
                                            data-rp-wrapper="#datepickerWrapperPick"
                                            data-rp-date-format="M d / Y"
                                            data-rp-default-date='["{{$currentDate}}"]'>
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Adults</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age 18+</span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center" type="text" value="2" min="01" max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Children</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age 6-17</span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center" type="text" value="4" min="01" max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">Infant</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="js-quantity flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">Age 0-5</span>
                                            <div class="flex-horizontal-center">
                                                <a class="js-minus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <input class="js-result form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center" type="text" value="1" min="01" max="100">
                                                <a class="js-plus font-size-10 text-dark" href="javascript:;">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="text-center">
                                    <a href="../tour/tour-booking.html" class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold">Book Now</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="border border-color-7 rounded p-4 mb-5 text-center text-white" style="background-color: #9ac854;">
                            <div class="p-1">
                                <span class="font-size-14">From</span>
                                <span class="font-size-24 text-white font-weight-bold ml-1">£{{ $getData->price }}pp*</span>
                            </div>
                            <p class="text-white">Inc. hotel & flight <br>Call to book this holiday</p>
                            <a href="tel:{{ $contact->phone_number ?? '' }}" class="p-2 align-items-center badge badge-pill bg-white transition-3d-hover font-size-19 font-weight-bold py-1" style="color:#9ac854;"><i class="flaticon-call font-size-25 mr-1"></i> {{ $contact->phone_number ?? '' }}</a>
                            <br><br>
                            {{-- <a href="mailto:{{ $contact->email ?? '' }}" class="align-items-center border badge badge-pill transition-3d-hover font-size-14 py-1 contact-email-btn text-white" style="background-color:#9ac854;"><i class="flaticon-envelope font-size-25 mr-1"></i> Enquire by email</a> --}}
                            
                        </div>
                        @include('frontPages.includes.why_book_with_us')
                    </div>
                </div>
            </div>
        
            <!-- Product Cards carousel -->
            <div class="product-card-carousel-block product-card-carousel-v5">
                <div class="space-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">You might also like...</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                        data-slides-show="4"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5"
                        data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4"
                        data-responsive='[{
                        "breakpoint": 1025,
                        "settings": {
                        "slidesToShow": 3
                        }
                        }, {
                        "breakpoint": 992,
                        "settings": {
                        "slidesToShow": 2
                        }
                        }, {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }, {
                        "breakpoint": 554,
                        "settings": {
                        "slidesToShow": 1
                        }
                        }]'>

                        @forelse($related_item as $key=>$value)
                        <div class="js-slide mt-5">
                            <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                                <div class="position-relative">
                                    <a href="{{route('front.hotel.single.detail',$value->id)}}" class="d-block gradient-overlay-half-bg-gradient-v5">
                                        <img class="card-img-top" src="{{asset('uploads/thumbnail/200x140/'.$value->image)}}" alt="{{$value->name}}">
                                    </a>
                                    <div class="position-absolute bottom-0 left-0 right-0">
                                        <div class="px-4 pb-3">
                                            <a href="{{route('front.hotel.single.detail',$value->id)}}" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{ $value->full_location }}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <a href="{{route('front.hotel.single.detail',$value->id)}}" class="card-title font-size-17 font-weight-medium text-dark">{{$value->name}}</a>
                                    <div class="mt-2 mb-3">
                                        <span class="font-size-14 text-gray-1 d-flex align-items-center">
                                            @if(isset($value->ta_rating) && $value->ta_rating != null)
                                                <img src="{{asset('img/taowl.png')}}">
                                                <img src="{{asset('uploads/'.$value->ta_rating->image)}}" style="width: 90px;height: 19px;" class="mr-1 ml-1">
                                            @endif
                                            (@if($taRatingMaster){{$value->ratingMaster->total_review ?? ''}} @endif reviews)
                                        </span>
                                    </div>
                                    <div class="mb-0">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="font-weight-bold">£{{$value->price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center col-12 d-block">No Data Found</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- End Product Cards carousel -->
        </div>
        <!-- Call Now to book -->
        @include('include.contact_info')
        <!-- END Call Now to book -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@push('custom-styles')
    <style type="text/css">
        #map {
          height: 400px;
          /* The height is 400 pixels */
          width: 100%;
          /* The width is the width of the web page */
        }
    </style>
@endpush
@push('custom-scripts')
    <script type="text/javascript">
        $("#more-aminity").on("click",function () {
            $(".scroll-aminities").click();
        });

        
        /*function initMap() {
            var lati = {{$getData->hotel_det->latitude ?? -25.344}};
            var longi = {{$getData->hotel_det->longitude ?? 131.036}};
          // The location of Uluru
          const uluru = { lat: lati, lng: longi };
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: uluru,
          });
          // The marker, positioned at Uluru
          const marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });
        }*/
    </script>
     {{-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuY6I4hZQvxo5RqCH7kogGKzcrjetRKQI&callback=initMap&libraries=&v=weekly"
      async
    ></script> --}}

@endpush
@endsection