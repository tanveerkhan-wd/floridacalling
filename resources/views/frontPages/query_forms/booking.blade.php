@extends('layouts.static_page_base')
@section('title', 'Quote Now')
@section('content')


<!-- ========== MAIN CONTENT ========== -->
<main id="content">
    <!-- Hero Section -->
    <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url(img/about_us_bg.jpg);">
        <div class="container space-top-xl-3 py-6 py-xl-0">
            <div class="row justify-content-center py-xl-4">
                <!-- Info -->
                <div class="py-xl-10 py-5">
                    <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">Get a Quote Now</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                        <li class="breadcrumb-item font-size-14"> <a class="text-white" href="{{url('/')}}">Home</a></li>
                      </ol>
                    </nav>
                </div>
                <!-- End Info -->
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <div class="container">
        <div class="row mt-4">
            <!-- Contacts Form -->
            <div class="col-lg-8 col-xl-9">
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
                <form class="js-validate" name="js-step-form" method="post">
                    {{ csrf_field() }}
                    <!-- FIRST STEP -->
                    {{-- <div class="mb-5 shadow-soft bg-white rounded-sm step-1">
                        <div class="py-3 px-4 px-xl-12 border-bottom">
                            <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-bed fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Type</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-pin fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Where?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-calendar fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">When?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-user-1 fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Who?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-invoice fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Your Details?</div>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                            <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                                Let us know your holiday type?
                            </h5>
                                <div class="row">
                                    <!-- Checkbox -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="holiday_type" value="1" required
                                                data-msg="Please select holiday type."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                <label class="custom-control-label pl-3 pt-2" for="termsCheckbox">
                                                    Package Holiday 
                                                </label>
                                            </div>
                                            <div id="holiday-type-error" class="invalid-feedback">Please select holiday type.</div>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->

                                    <!-- Checkbox -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox1" name="holiday_type" value="2" required
                                                data-msg="Please select holiday type."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                <label class="custom-control-label pl-3 pt-2" for="termsCheckbox1">
                                                    Multi Center 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->
                                    
                                    <!-- Checkbox -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox2" name="holiday_type" value="3" required
                                                data-msg="Please select holiday type."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                <label class="custom-control-label pl-3 pt-2" for="termsCheckbox2">
                                                    Flight + Vehicle 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->

                                     <!-- Checkbox -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox3" name="holiday_type" value="4" required
                                                data-msg="Please select holiday type."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                <label class="custom-control-label pl-3 pt-2" for="termsCheckbox3">
                                                    Cruise + Stay 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->

                                     <!-- Checkbox -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox4" name="holiday_type" value="5" required
                                                data-msg="Please select holiday type."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                <label class="custom-control-label pl-3 pt-2" for="termsCheckbox4">
                                                    Accommodation Only
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->
                                </div>

                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4 hide_content accomodation-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Accommodation type? <span class="text-danger">*</span>
                                            </label>
                                            <select name="accommodation_type" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select Accommodation type." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $accomo = Config::get('constant.hotel_type');
                                                @endphp
                                                <option value="">Select</option>
                                                @foreach($accomo as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                            <div id="acc-type-error" class="invalid-feedback">Please select accomodation type.</div>
                                        </div>
                                    </div>
                                    <!-- End Input -->                                    

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4 hide_content destination-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                How many destinations? <span class="text-danger">*</span>
                                            </label>
                                            <select name="number_stops" class="form-control js-select selectpicker dropdown-select" required="" data-msg="How many stops?" data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                <option value="">Select number of stops</option>
                                                <option value="2">2 Stops</option>
                                                <option value="3">3 Stops</option>
                                                <option value="4">4 Stops</option>
                                                <option value="5">5 Stops</option>
                                                <option value="6">6 Stops</option>
                                                <option value="7">7 Stops</option>
                                                <option value="8">8 Stops</option>
                                            </select>
                                            <div id="number-stops-error" class="invalid-feedback">Please select number of stops.</div>
                                        </div>
                                    </div>
                                    <!-- End Input -->    

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4 hide_content cruse_stay-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Preferred cruise line <span class="text-danger">*</span>
                                            </label>
                                            <select name="preferred_cruise" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select country." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $cruse_line = Config::get('constant.cruse_line');
                                                @endphp
                                                @foreach($cruse_line as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Input -->       
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4 hide_content cruse_stay-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Cabin type <span class="text-danger">*</span>
                                            </label>
                                            <select name="cabin_type" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please cabin type." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $cabin_type = Config::get('constant.cabin_type');
                                                @endphp
                                                @foreach($cabin_type as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                </div>
                                <div class="col-12 align-self-end">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 step-btn" data-step="1">Continue</button>
                                    </div>
                                </div> 
                            <!-- End Contacts Form -->
                        </div>
                    </div> --}}

                    <!-- SECOND STEP -->
                    {{-- <div class="mb-5 shadow-soft bg-white rounded-sm step-2 hide_content">
                        <div class="py-3 px-4 px-xl-12 border-bottom">
                            <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-bed fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Type</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-pin fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Where?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-calendar fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">When?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-user-1 fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Who?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-invoice fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Your Details?</div>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-12">
                                        <label class="form-label fd-1 hide_content font-size-19 font-weight-bold wheer-destination-lable">
                                            Select Your 1st Destination.
                                        </label>
                                    </div>
                                    <div class="col-sm-12 mb-4 search-destination-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Search your destination <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control book-desti-search-address" placeholder="Search your destination here..." autocomplete="off" aria-label="" required
                                                data-msg="Please enter destination."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                            <input type="hidden" name="location_id[]" value="">
                                            <ul class="list-group text-left book-desti-search" style="display: none;">
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Input -->                                    

                                    <!-- Input -->
                                    <div class="col-sm-12 mb-4 length-stay-box">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Length of stay <span class="destin_name"></span>? <span class="text-danger">*</span>
                                            </label>
                                            <select name="stay_time[]" class="form-control dropdown-select" required="" aria-label="" data-msg="Please select length of destination." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $destiLen = Config::get('constant.destination_length');
                                                @endphp
                                                <option value="">Select destination length </option>
                                                @foreach($destiLen as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Input -->
                                    <div class="where-box w-100">
                                        
                                    </div>
                                    <!-- Input -->
                                    <div class="col-sm-12 mb-4 vehicle-type hide_content">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Select vehicle type <span class="text-danger">*</span>
                                            </label>
                                            <select name="vehicle_type" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select type of vehicle." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $vehicle_type = Config::get('constant.vehicle_type');
                                                @endphp
                                                <option value="">Select vehicle type </option>
                                                @foreach($vehicle_type as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Input -->    


                                    <!-- Input -->
                                    <div class="col-sm-12 mb-4 cruse-destination hide_content">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Select cruise destination <span class="text-danger">*</span>
                                            </label>
                                            <select name="cruse_destination" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select cruise destination." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $cruise_des = Config::get('constant.cruse_destination');
                                                @endphp
                                                <option value="">Select cruise destination </option>
                                                @foreach($cruise_des as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Input -->    
                                    
                                </div>
                                <div class="col-12 align-self-end hide_content">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-17 font-weight-bold py-3 next-destination-btn" data-activenumber="" data-number="">Next destination</button>
                                    </div>
                                </div> 
                                <div class="col-12 align-self-end where-box-btn">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-gray-4 btn-wide rounded-sm transition-3d-hover font-size-17 font-weight-bold py-3 prev-step-btn" data-step="2">Prev</button>
                                        <button type="button" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-17 font-weight-bold py-3 step-btn" data-step="2">Continue</button>
                                    </div>
                                </div> 
                            <!-- End Contacts Form -->
                        </div>
                    </div> --}}

                    <!-- THREE STEP -->
                    {{-- <div class="mb-5 shadow-soft bg-white rounded-sm step-3 hide_content">
                        <div class="py-3 px-4 px-xl-12 border-bottom">
                            <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-bed fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Type</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-pin fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Where?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-calendar fa-2x"></i>
                                    </div>
                                    <div class="text-primary">When?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-user-1 fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Who?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-invoice fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Your Details?</div>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Select your departure date <span class="text-danger">*</span>
                                            </label>
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="d-flex align-items-center mr-2 font-size-21">
                                                          <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                        </span>
                                                    </div>
                                                    <input name="departure_date" class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0" type="text" placeholder="{{date('M d/Y')}}" aria-label="{{date('M d/Y')}}"
                                                         data-rp-wrapper="#datepickerWrapperPick"
                                                         data-rp-date-format="M d /Y">
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-sm-6">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Are you flexible on this date? <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select country." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $flexDate = Config::get('constant.flexible_date_type');
                                                @endphp
                                                @foreach($flexDate as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Preferred departure airport? <span class="text-danger">*</span>
                                            </label>
                                            <select name="flying_from" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select departure airport." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $departure_airport = Config::get('constant.departure_airport');
                                                @endphp
                                                <option value="">Select Airport </option>
                                                @foreach($departure_airport as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Transport required? <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select transport requirement." data-error-class="u-has-error" data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $tranport_req = Config::get('constant.transport_req');
                                                @endphp
                                                <option value="">Select transport</option>
                                                @foreach($tranport_req as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 align-self-end text-right">
                                        <button type="button" class="btn btn-gray-4 btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 prev-step-btn" data-step="3">Prev</button>
                                        <button type="button" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 step-btn" data-step="3">Continue</button>
                                    </div>
                                </div> 
                            <!-- End Contacts Form -->
                        </div>
                    </div> --}}

                    <!-- FOUR STEP -->
                    {{-- <div class="mb-5 shadow-soft bg-white rounded-sm step-4 hide_content">
                        <div class="py-3 px-4 px-xl-12 border-bottom">
                            <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-bed fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Type</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-pin fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Where?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-calendar fa-2x"></i>
                                    </div>
                                    <div class="text-primary">When?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-user-1 fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Who?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                        <i class="flaticon-invoice fa-2x"></i>
                                    </div>
                                    <div class="text-gray-1">Your Details?</div>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Number of adults? <span class="text-danger">*</span>
                                            </label>
                                            <select name="adults" class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select country."     data-error-class="u-has-error" 
                                                data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $accomo = Config::get('constant.no_adults');
                                                @endphp
                                                <option value="">Select a number</option>
                                                @foreach($accomo as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>

                                    <div class="col-sm-6 mb-4">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Children under 12 yrs old?
                                            </label>
                                            <select name="children" class="form-control js-select selectpicker dropdown-select"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $accomo = Config::get('constant.no_children');
                                                @endphp
                                                <option value="">Select a number</option>
                                                @foreach($accomo as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Input -->
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Infants under 2 yrs old?
                                            </label>
                                            <select name="infants" class="form-control js-select selectpicker dropdown-select"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                                @php
                                                    $accomo = Config::get('constant.no_infants');
                                                @endphp
                                                <option value="">Select a number</option>
                                                @foreach($accomo as $key=>$val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- End Input -->   
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 align-self-end text-right">
                                        <button type="button" class="btn btn-gray-4 btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 prev-step-btn" data-step="4">Prev</button>
                                        <button type="button" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 step-btn" data-step="4">Continue</button>
                                    </div>
                                </div> 
                            <!-- End Contacts Form -->
                        </div>
                    </div> --}}

                    <!-- FIFTH STEP -->
                    <div class="mb-5 shadow-soft bg-white rounded-sm step-5">
                        <div class="py-3 px-4 px-xl-12 border-bottom">
                            {{-- <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-bed fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Type</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-pin fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Where?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-calendar fa-2x"></i>
                                    </div>
                                    <div class="text-primary">When?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-user-1 fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Who?</div>
                                </li>
                                <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                    <div class="flex-content-center width-50 height-50 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                        <i class="flaticon-invoice fa-2x"></i>
                                    </div>
                                    <div class="text-primary">Your Details?</div>
                                </li>
                            </ul> --}}
                            <h1 class="font-size-30 font-size-xs-30 font-weight-bold mb-0 text-center">Get a Quote Now</h1>

                        </div>
                        <div class="pt-4 pb-5 px-5">
                            <div class="row">
                                
                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input name="name" minlength="3" type="text" value="{{old('name') ?? ''}}" class="form-control alpha-only" placeholder="" aria-label="" required
                                        data-msg="Please enter name."
                                        data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    </div>
                                </div>
                                
                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Phone number <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" min="999999999" max="9999999999" class="form-control" name="phone" value="{{old('phone') ?? ''}}" placeholder="" aria-label="" required
                                        data-msg="Please enter your phone number."
                                        data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->


                                <!-- End Input -->
                                <div class="col-sm-12 mb-4">
                                    <!-- Input -->
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Email address <span class="text-danger">*</span>
                                        </label>
                                        <input value="{{old('email') ?? ''}}" type="email" class="form-control email-validate" name="email" id="signinSrEmail"  aria-label="Email Or Username" aria-describedby="signinEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-sm-12 mb-4">
                                    <!-- Input -->
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Anything we've missed?
                                        </label>
                                        <textarea name="text" required="" rows="3" class="form-control" data-msg="This field is required." data-error-class="u-has-error" data-success-class="u-has-success" placeholder="Any other comments or requests? Do you have any preferred hotels or are you celebrating a special occasion like a honeymoon?"></textarea>
                                    </div>
                                    <!-- End Input -->   
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 align-self-end text-center">
                                    {{-- <button type="button" class="btn btn-gray-4 btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 prev-step-btn" data-step="5">Prev</button> --}}
                                    <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 step-btn" data-step="5">Submit</button>
                                </div>
                            </div> 
                            <!-- End Contacts Form -->
                        </div>
                    </div>

                    <!-- Success STEP -->
                    {{-- <div class="mb-5 shadow-soft bg-white rounded-sm step-6 hide_content">
                        <div class="py-6 px-5 border-bottom">
                            <div class="flex-horizontal-center">
                                <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                    <i class="flaticon-tick text-white font-size-24"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                        Thank You. Your Booking Order is Confirmed Now.
                                    </h3>
                                    <p class="mb-0">A confirmation email has been sent to your provided email address.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </form>

            </div>
            <div class="col-lg-4 col-xl-3">
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

                {{-- <div class="shadow-soft bg-white rounded-sm">
                    <div class="pt-5 pb-3 px-5 border-bottom">
                        <a href="#" class="d-block mb-3">
                            <img class="img-fluid rounded-sm" src="../../assets/img/240x160/img5.jpg" alt="Image-Description">
                        </a>
                        <a href="#" class="text-dark font-weight-bold mb-2 d-block">5-Day Oahu Tour: Honolulu, Pearl Harbor, & Diamond Head</a>
                        <div class="mb-1 flex-horizontal-center text-gray-1">
                            <i class="icon flaticon-pin-1 mr-2 font-size-15"></i> United Kingdom
                        </div>
                    </div>
                    <!-- Basics Accordion -->
                    <div id="basicsAccordion">
                        <!-- Card -->
                        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingOne">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseOne"
                                        aria-expanded="true"
                                        aria-controls="basicsCollapseOne">
                                        Booking Detail

                                        <span class="card-btn-arrow font-size-14 text-dark">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseOne" class="collapse show"
                                aria-labelledby="basicsHeadingOne"
                                data-parent="#basicsAccordion">
                                <div class="card-body px-4 pt-0">
                                    <!-- Fact List -->
                                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Date <br> 22/09/2020</span>
                                            <span class="text-secondary"><a href="#" class="text-underline">Edit</a></span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Duration</span>
                                            <span class="text-secondary">26 days</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Activity Type</span>
                                            <span class="text-secondary">Dailty Activity</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Max People</span>
                                            <span class="text-secondary">10</span>
                                        </li>
                                    </ul>
                                    <!-- End Fact List -->
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingTwo">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseTwo"
                                        aria-expanded="false"
                                        aria-controls="basicsCollapseTwo">
                                        Extra

                                        <span class="card-btn-arrow font-size-14 text-dark">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseTwo" class="collapse"
                                aria-labelledby="basicsHeadingTwo"
                                data-parent="#basicsAccordion">
                                <div class="card-body px-4 pt-0">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingThree">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseThree"
                                        aria-expanded="false"
                                        aria-controls="basicsCollapseThree">
                                        Coupon Code

                                        <span class="card-btn-arrow font-size-14 text-dark">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseThree" class="collapse show"
                                aria-labelledby="basicsHeadingThree"
                                data-parent="#basicsAccordion">
                                <div class="card-body px-4 pt-0 pb-4">
                                    <!-- Subscribe Form -->
                                    <form class="js-focus-state">
                                        <label class="sr-only" for="CouponCodeExample1">Coupon Code</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="email" id="CouponCodeExample1" placeholder="" aria-label="" aria-describedby="CouponCodeExample2" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-2" type="button" id="CouponCodeExample2">Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Subscribe Form -->
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseFour"
                                        aria-expanded="false"
                                        aria-controls="basicsCollapseFour">
                                        Payment

                                        <span class="card-btn-arrow font-size-14 text-dark">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="basicsCollapseFour" class="collapse show"
                                aria-labelledby="basicsHeadingFour"
                                data-parent="#basicsAccordion">
                                <div class="card-body px-4 pt-0">
                                    <!-- Fact List -->
                                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Adult Price</span>
                                            <span class="text-secondary">£580,00</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Children Price</span>
                                            <span class="text-secondary">£0,00</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Infant Price</span>
                                            <span class="text-secondary">£0,00</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Subtotal</span>
                                            <span class="text-secondary">£580,00</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2">
                                            <span class="font-weight-medium">Tax</span>
                                            <span class="text-secondary">0 %</span>
                                        </li>

                                        <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">
                                            <span class="font-weight-bold">Pay Amount</span>
                                            <span class="">£580,00</span>
                                        </li>
                                    </ul>
                                    <!-- End Fact List -->
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Basics Accordion -->
                </div> --}}
            </div>
        </div>
    </div>
    @include('include.contact_info')
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
    <script type="text/javascript" src="{{asset('js/front_custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/front/query_form.js')}}"></script>
@endpush

@endsection