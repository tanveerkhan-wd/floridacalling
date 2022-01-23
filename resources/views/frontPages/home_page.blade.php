        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <!-- ========== HERO ========== -->
            <div class="bg-img-hero-bottom gradient-overlay-half-bg-violet space-1 space-top-xl-4 text-left" style="background-image: url(img/bg-img.jpeg);">
                <div class="container">
                    <!-- Info -->
                    <div class="row">
                        <div class="px-1 pb-1 py-xl-4 mt-xl-1 home-banner-text col-md-7">
                          <h1 class="font-size-50 font-size-xs-25 text-white font-weight-bold">Discover hand picked holidays in Florida</h1>
                          <p class="font-size-17 font-weight-normal text-white">Find awesome hotels, tours and activities in Florida</p>
                        </div>
                        <div class="px-1 pb-1 py-xl-4 mt-xl-1 col-md-4 shadow-soft bg-white rounded-sm m-3">
                            <form class="js-validate" name="js-step-form" method="post" action="{{url('/query-form')}}">
                                {{ csrf_field() }}
                                <div class="pt-2 pb-1 px-3">
                                    <div class="row home-banr-form-header"><img class="mr-2" src="{{asset('img/sunbed.png')}}">Get a quote now</div>
                                    <div class="row">
                                        <div class="col-12">
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
                                        </div>
                                        <div class="col-sm-12 mb-4 mt-3">
                                            <div class="js-form-message">
                                                <input name="name" type="text" value="{{old('name') ?? ''}}" class="form-control alpha-only" minlength="2" placeholder="Name" aria-label="" required
                                                data-msg="Please enter name."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 mb-4">
                                            <div class="js-form-message">
                                                <input type="text" class="form-control" name="phone" value="{{old('phone') ?? ''}}" max="9999999999" min="999999999" placeholder=" Phone number" aria-label="" required
                                                data-msg="Please enter your phone number."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mb-1">
                                            <!-- Input -->
                                            <div class="js-form-message">
                                                <input name="email" value="{{old('email') ?? ''}}" placeholder="Email address" type="email" class="form-control email-validate" id="signinSrEmail"  aria-label="Email Or Username" aria-describedby="signinEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 text-center d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-2 step-btn">Quote Now</button>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Info -->
                    {{-- <div class="pt-xl-4">
                        <div class="mb-2">
                            <!-- Nav Classic -->
                            <ul class="nav tab-nav flex-nowrap tab-nav-shadow justify-content-start" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-medium active" id="pills-one-example2-tab" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="true">
                                        <div class="d-flex flex-column flex-md-row  position-relative text-white align-items-center">
                                            <figure class="ie-height-40 d-md-block mr-md-3">
                                                <i class="flaticon-global-1 font-size-3"></i>
                                            </figure>
                                            <span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Destinations</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Nav Classic -->
                            <div class="tab-content hero-tab-pane">
                                <div class="tab-pane fade active show" id="pills-one-example2" role="tabpanel" aria-labelledby="pills-one-example2-tab">
                                    <!-- Search Jobs Form -->
                                    <div class="p-3 gradient-overlay-half-white-gradient">
                                        <div class="card border-0">
                                            <form id="search_destination_form" method="get" action="{{route('front.hotel.listing')}}">
                                              <div class="row d-block nav-select d-lg-flex mb-lg-2 p-3">
                                                <div class="col-sm-12 col-xl-10 mb-2 mb-xl-0 ">
                                                    <!-- Input -->
                                                    <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Search Destinations</span>
                                                    <div class="mb-2">
                                                        <div class="input-group border-bottom border-width-2 border-color-1">
                                                            <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                                                          <input type="text" id="home_destination" name="location" class="form-control text-primary font-weight-semi-bold font-size-16 shadow-none font-weight-bold border-0 p-0" placeholder="Where are you going?" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mb-2 col-lg-2 col-xl-1dot8 align-self-lg-end text-md-right">
                                                    <button type="submit" class="home_search_desti_btn btn btn-primary text-white font-weight-bold btn-normal transition-3d-hover w-100 w-md-auto w-lg-100"><i class="flaticon-magnifying-glass mr-2"></i>Search</button>
                                                </div>
                                                <div class="invalid-feedback invalid-feedback-home-search text-left pl-2">
                                                  Please enter and select your destination and search.
                                                </div>
                                                <ul class="list-group text-left w-100 desti_search_list" style="display: none; list-style: none;background: white;color: black;padding: 12px;border-radius: 6px;">
                                                  
                                                </ul>
                                              </div>
                                              <!-- End Checkbox -->
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Search Jobs Form -->
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- ==========END HERO ========== -->

            <!-- Top Destination v3 -->
            {{-- <div class="destination-block destination-v3 border-bottom border-color-8">
                <div class="container space-1">
                    <div class="mb-3 pb-md-3 mb-md-2 mt-3">
                        <h2 class="font-weight-bold font-size-xs-20 font-size-30 mb-0">Top Destinations</h2>
                    </div>
                    <div class="row">
                        
                        @foreach($all_state as $key=> $value)
                        @if($key==0)
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{$value->name}}</a>

                                        
                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif
                    
                        
                        @if($key==1)
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{$value->name}}</a>

                                        
                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif

                        @if($key==2)
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{ $value->name }}</a>

                                        
                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif
                        

                        @if($key==3)
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{$value->name}}</a>

                                        
                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif
                        
                        @if($key==4)
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4 pb-1">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{$value->name}}</a>

                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif
                        <!-- End Card Block -->

                        <!-- Card Block -->
                        @if($key==5)
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient-v4 gradient-overlay transition-3d-hover shadow-hover-2 dropdown" style="background-image: url(uploads/{{$value->image}});">
                                <header class="w-100 d-flex justify-content-between mb-3">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.listing')}}?location={{$value->name}}" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">{{$value->name}}</a>

                                        <div class="destination-dropdown v1">
                                            
                                        </div>
                                        
                                    </div>
                                </header>
                            </div>
                        </div>
                        @endif
                        
                        @endforeach
                    </div>
                </div>
            </div> --}}
            <!-- End Destinantion v3 -->

            <!-- Trending Tour -->
            <div class="product-card-block product-card-v1 border-bottom border-color-8">
                <div class="container space-1">
                    <div class="d-flex justify-content-between pt-md-3 mt-1 pb-md-3 align-items-end">
                        <h2 class="font-weight-bold font-size-xs-20 font-size-30 mb-0 text-lh-sm">Trending Holidays</h2>
                        <a href="{{route('front.hotel.listing')}}" class="font-weight-bold d-flex text-lh-1 mb-md-2 ml-2">More
                            <i class="flaticon-right-arrow ml-2"></i>
                        </a>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3 mb-4" data-slides-show="4" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right" data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4" data-responsive='[ { "breakpoint": 1025, "settings": { "slidesToShow": 3 } }, { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } }, { "breakpoint": 554, "settings": { "slidesToShow": 1 } } ]'>
                        @foreach($getTrendData as $tkey=> $trend)
                        
                        <div class="js-slide mt-3 mt-md-2">
                            <div class="card mb-1 transition-3d-hover shadow-hover-2 w-100">
                                <div class="position-relative mb-2">
                                    <a href="{{route('front.hotel.single.detail',$trend->slug)}}" class="d-block ">
                                        <img class="card-img-top" src="@if($trend->image !=null){{asset('uploads/thumbnail/200x140/'.$trend->image)}}@else {{asset('img/no_image.png')}} @endif" alt="Image Desription">
                                    </a>
                                    <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                        {{-- <a href="{{route('front.hotel.single.detail',$trend->slug)}}">
                                            <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Featured</span>
                                        </a> --}}
                                        <a href="javascript::void(0)">
                                        {{-- <span class="badge badge-pill bg-white text-danger px-3 ml-3 py-2 font-size-14 font-weight-normal">-£{{$trend->saving}}</span> --}}
                                        </a>
                                    </div>
                                    
                                </div>

                                <div class="card-body px-4 pt-2 pb-3">
                                    <a href="{{route('front.hotel.single.detail',$trend->slug)}}" class="card-title font-size-17 font-weight-bold mb-0 text-dark">{{$trend->name}}</a>
                                    <a href="{{route('front.hotel.single.detail',$trend->slug)}}" class="d-block">
                                        <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i>{{$trend->full_location}}
                                        </div>
                                    </a>
                                    <div class="my-2">
                                        <div class="d-inline-flex align-items-center font-size-14 text-lh-1 text-primary">
                                            <div class="text-yellow-lighter-2">
                                                @if(isset($trend->hotel_rating))
                                                    @for($i=0; $i<round($trend->hotel_rating); $i++)
                                                        <small class="fas fa-star"></small>
                                                    @endfor
                                                @endif
                                            </div>
                                            <div class="white-star ml-1 mr-1">
                                                @if(isset($trend->hotel_rating))
                                                    @for($i=0; $i<5-round($trend->hotel_rating); $i++)
                                                        <small class="fas fa-star"></small>
                                                    @endfor
                                                @endif
                                            </div>

                                        </div>
                                            

                                    </div>
                                    <span class="text-secondary d-flex font-size-12 mt-1 align-items-center">
                                        @if($trend->ta_rating->image != null)
                                            <img src="{{asset('img/taowl.png')}}">
                                            <img src="{{asset('uploads/'.$trend->ta_rating->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                        @endif
                                        (@if(isset($trend->ratingMaster)){{number_format($trend->ratingMaster->total_review) ?? ''}}@endif Reviews)
                                    </span>
                                    <div class="mb-0 d-flex">
                                        <span class="mr-1 font-size-14 text-gray-1">From</span>
                                        <span class="mr-1 font-weight-bold">£{{ $trend->price }}</span>
                                        <span class="mr-1"><img src="{{asset('img/info.svg')}}" class="guest-info" alt="info" data-toggle="tooltip" data-placement="top" title="Based on 0{{$trend->hotel_det->guests ?? ''}} Adults 0{{$trend->hotel_det->guests ?? ''}} Children Sharing"></span>
                                        <span class="font-size-14 text-gray-1">For {{ $trend->days }} Nights</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Product Cards -->



            @include('frontPages.includes.why_choose_us')



            <!-- Recommended Hotels -->
            <div class="product-card-block product-card-v2 border-bottom border-color-8">
                <div class="container space-1">
                    <div class="d-flex justify-content-between mb-3 pt-md-3 mt-1 pb-md-3 mb-md-2 align-items-end">
                        <h2 class="font-weight-bold font-size-xs-20 font-size-30 mb-0 text-lh-sm">Recommended Holiday Stays</h2>
                        <a href="{{route('front.hotel.listing')}}" class="font-weight-bold d-flex text-lh-1 mb-md-2 ml-2">More
                            <i class="flaticon-right-arrow ml-2"></i>
                        </a>
                    </div>
                    <div class="row">
                        @foreach($getFavData as $key => $favValue)
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                <div class="card transition-3d-hover shadow-hover-2 h-100">
                                    <div class="position-relative">
                                        <a href="{{route('front.hotel.single.detail',$favValue->slug)}}" class="d-block ">
                                            <img class="card-img-top" src="@if($favValue->image !=null){{asset('uploads/thumbnail/200x140/'.$favValue->image)}}@else {{asset('img/no_image.png')}} @endif" alt="Image Desription">
                                        </a>
                                        {{-- <div class="position-absolute bottom-0 left-0 right-0">
                                            <div class="px-4 pb-3">
                                                <a href="{{route('front.hotel.single.detail',$favValue->slug)}}" class="d-block">
                                                    <div class="d-flex align-items-center font-size-14 text-white">
                                                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> 
                                                        {{ $favValue->full_location }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="card-body px-4 pt-2 pb-3">
                                        <a href="{{route('front.hotel.single.detail',$favValue->slug)}}" class="card-title font-size-17 font-weight-medium text-dark">{{ $favValue->name }}</a>
                                        <a href="{{route('front.hotel.single.detail',$favValue->slug)}}" class="d-block">
                                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>{{$favValue->full_location}}
                                            </div>
                                        </a>
                                        <div class="mb-2">
                                            <div class="d-inline-flex align-items-center font-size-14 text-lh-1 text-primary">
                                                <div class="text-yellow-lighter-2">
                                                    @if(isset($favValue->hotel_rating))
                                                        @for($i=0; $i<round($favValue->hotel_rating); $i++)
                                                            <small class="fas fa-star"></small>
                                                        @endfor
                                                    @endif
                                                </div>
                                                <div class="white-star ml-1 mr-1">
                                                    @if(isset($favValue->hotel_rating))
                                                        @for($i=0; $i<5-round($favValue->hotel_rating); $i++)
                                                            <small class="fas fa-star"></small>
                                                        @endfor
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <span class="font-size-12 text-gray-1 align-items-center">
                                                @if($favValue->ta_rating->image != null)
                                                    <img src="{{asset('img/taowl.png')}}">
                                                    <img src="{{asset('uploads/'.$favValue->ta_rating->image)}}" style="width: 90px;height: 19px;" class="mr-1">
                                                @endif
                                                (@if(isset($favValue->ratingMaster)){{ $favValue->ratingMaster->total_review ?? '' }}@endif reviews)
                                            </span>
                                        </div>

                                        <div class="mb-0">
                                            <span class="mr-1 font-size-14 text-gray-1">From</span>
                                            <span class="font-weight-bold">£{{ $favValue->price }}</span>
                                            <span><img src="{{asset('img/info.svg')}}" class="guest-info" alt="info" data-toggle="tooltip" data-placement="top" title="Based on 0{{$trend->hotel_det->guests ?? ''}} Adults 0{{$trend->hotel_det->guests ?? ''}} Children Sharing"></span>
                                            <span class="font-size-14 text-gray-1">For {{ $favValue->days }} Nights</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Product Cards -->
            
            <!-- Call Now to book -->
            @include('include.contact_info')
            <!-- END Call Now to book -->
            
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
        @push('custom-scripts')
            <script type="text/javascript" src="{{ asset('js/home_page.js') }}"></script>
            <script type="text/javascript">
                $(function() {
                    hideLoder();
                });
            </script>
        @endpush