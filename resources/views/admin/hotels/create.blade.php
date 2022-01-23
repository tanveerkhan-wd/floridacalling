@extends('admin.layout.admin-base')
@section('title', 'add hotel')
@section('content')
@php
  $hotel_rating = Config::get('constant.hotel_rating'); 
  $hotel_type = Config::get('constant.hotel_type');
@endphp
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    {{-- ==================================================== --}}
    {{-- =====================EDIT HOTELS==================== --}}
    @if(!empty($hotel))
      <section class="content-header">
        <h1>
          Edit Hotel
          <small><i class="fa fa-Hotel"></i></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Hotel</li>
        </ol>
      </section>
       <!-- Main content -->
      <section class="content">
        {{-- ====error message=== --}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
          @endforeach
        @endif
        {{-- ====error message=== --}}
        <div class="row">
          <form class="form-horizontal image-form" action="{{route('admin.hotel.edit',$hotelDet->hotel_id)}}" method="post" enctype="multipart/form-data">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Hotel</h3>
              </div>
              <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="hotelDetId" value="{{$hotelDet->id}}">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Location<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control hotelLocationId select2" name="location_id" required>
                      @foreach($location as $result)
                        <option value="{{$result['id']}}" @if($hotel->location_id==$result['id']) selected @endif >{{$result['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Name<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$hotel->name}}" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="image">
                  </div>
                  <div class="col-sm-2">
                    <img class="img-thumbnail" src="@if($hotel->image) {{ asset('uploads/'.$hotel->image) }} @else {{ asset('img/.no_image.png') }} @endif">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Price<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="{{$hotel->price}}" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nights/Duration<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$hotel->days}}" name="days" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Set Saving Amount</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="{{$hotel->saving}}" name="saving">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">hotel_rating <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control" name="c_hotel_rating" required>
                      <option value="">Choose...</option>
                      @foreach($hotel_rating as $kii =>$val)
                        <option value="{{$kii}}" @if($kii==$hotel->hotel_rating) selected="" @endif>{{$val}} Star</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Type <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control hotel_type" name="type" required="">
                      <option value="">Choose..</option>
                      @foreach($hotel_type as $kii =>$val)
                        <option value="{{$kii}}" @if($kii==$hotel->type) selected="" @endif>{{$val}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="form-group disneyResort" style="display: none;">
                  <label class="col-sm-2 control-label">Select Disney Resort Type</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="disney_resort_id">
                      @if($hotel->disney_resort_id!=0)
                      <option value="{{$hotel->disney_resort_id}}" selected>{{$hotel->disneyResort->title}}</option> @endif
                      @foreach($disneyResortType as $drtData)
                        <option value="{{$drtData->id}}">{{$drtData->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>

            {{-- ===============EDIT HOTELS DETAILS================ --}}
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Hotel Details</h3>
              </div>
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Descripton<span class="text-red">*</span></label> 
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description" rows="4" placeholder="Enter ..." required="">{!! $hotelDet->description !!}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Facilities<span class="text-red">*</span></label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="facility[]" multiple="multiple" required="">

                        @foreach($getSelectedCat as $faci)
                          <option value="{{$faci->id}}" selected>{{$faci->name}}</option>
                        @endforeach
                        @foreach($facility as $faciResult)
                          <option value="{{$faciResult->id}}">{{$faciResult->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Latitude</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$hotelDet->latitude}}" name="latitude">
                  </div>
                  <label class="col-sm-2 control-label">Longitude</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$hotelDet->longitude}}" name="longitude">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Meal Plan Master </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="board">
                      <option value="">Choose..</option>
                      @foreach($meal as $m_val)
                      <option value="{{$m_val['id']}}" @if($m_val['id']==$hotelDet->board) selected @endif>{{$m_val['meal_name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Guests</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$hotelDet->guests}}" placeholder="Enter Guests" name="guests">
                    </div>
                  </div>

                  <div class="form-group results-div">
                    @php
                      $aNearby=json_decode($hotelDet->near_by);
                    @endphp
                    @if(!empty($aNearby))
                    @foreach($aNearby as $key=>$allplace)
                    @if($key ==0)<label class="col-sm-2 control-label">Add Nearby Place</label>@endif
                    <div class="remove-div">
                      <div class="@if($key ==0) @else col-sm-offset-2 @endif col-sm-8">
                        <input type="text" name="nearby[]" value="{{$allplace}}" class="form-control" placeholder="Add Nearby Place With KM">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-danger remove" onclick="remove($(this))">X</button>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Add More Nearby Place</label>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-primary add-more" onclick="moreuniversity($(this))">Add More NearBy Place</button>
                    </div><br>
                  </div>

                    @php
                      $aDepartureDate=json_decode($hotelDet->departure_date);
                      @endphp
                  <div class="form-group dept-date">
                    @if(!empty($aDepartureDate))
                    @forelse($aDepartureDate as $key=>$dd)
                      @if($key ==0)<label class="col-sm-2 control-label">Departure Date</label>@endif
                    <div class="remove-dept">
                      <div class="@if($key ==0) @else col-sm-offset-2 @endif col-sm-8">
                        <input type="date" name="departure_date[]" value="{{$dd}}" class="form-control add-dept" placeholder="Enter Departure Date">
                      </div>
                       <div class="col-sm-2" >
                        <button type="button" class="btn btn-danger remove-dept" onclick="removeDept($(this))">X</button>
                      </div>
                    </div>
                    @empty
                    @endforelse
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Add Departure Date</label>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-primary add-more-dept" onclick="depatureDate($(this))">Add More Departure Date</button>
                      </div><br><br>
                  </div>

                  <div class="form-group airport-div">
                  <label class="col-sm-2 control-label">Airport</label>
                  <div class="col-sm-10">
                    <select class="form-control airportMaster select2" multiple="multiple" name="airport[]">
                      @if(!empty($getAirportData))
                        @foreach($getAirportData as $airData)
                          <option value="{{$airData['id']}}" selected>{{$airData['airport_code']}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                <div class="form-group airport-div">
                  <label class="col-sm-2 control-label">Airline</label>
                  <div class="col-sm-10">
                    <select class="form-control airlineMaster select2" multiple="multiple" name="airline[]">
                      @if(!empty($getAirlineData))
                        @foreach($getAirlineData as $airData)
                          <option value="{{$airData['id']}}" selected>{{$airData['airline_name']}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                  {{-- IMAGE SHOWING --}}
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Multiple Images</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" placeholder="Upload Image" name="multi_images[]" multiple>
                    </div>
                  </div>

                  <div class="row image-box"> 
                      <div class="col-md-12">
                        <div class="alert alert-success hide" id="image-msg">
                          <p><i class="icon fa fa-check"></i> Image removed successfully ...</p>
                        </div>
                      </div>                  
                        @php ($aImageUrl= $hotelDet->images!=null? json_decode($hotelDet->images) :[])
                        @foreach($aImageUrl as $allImage)
                        <div class="col-sm-2 center image-main-div">
                          <p class="cross-img-btn">        
                            <button type="button" media-id="{{$hotelDet->id}}" media-image="{{$allImage}}" class="btn btn-danger delete-image" title="Remove">×</button>
                          </p>
                              @if($allImage)                   
                                  <img src="{{ asset('uploads/'.$allImage) }}" class="img img-responsive img-thumbnail">
                              @else
                                  <img src="{{ asset('uploads/'.$allImage) }}" class="img img-responsive img-thumbnail"> 
                              @endif 
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>    

            {{-- ========== CREATE HOTEL RATING ========= --}}
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Add TA Ratings</h3>
              </div>
              <div class="box-body">

                <div class="form-group row">
                  <div class="col-sm-2 col-md-2"></div>
                  <label class="text-right col-sm-3 control-label">Number Of Hotel Rating <span class="text-red">*</span></label>
                  <div class="col-sm-5">
                    <select class="form-control" name="rating" value="{{old('rating')}}" required="">
                      <option value="">Choose hotel rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}" @if($hotel->rating==$ri_val->id) selected @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Total Review<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->total_review ?? ''}}" placeholder="Only in number" name="total_review" min="0" required="">
                  </div>

                  <label class="text-right col-sm-2 control-label">Excelent Review<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->excellent ?? ''}}" placeholder="Only in number" name="excellent" min="0" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Very Good<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->very_good ?? ''}}" placeholder="Only in number" name="very_good" min="0" required="">
                  </div>

                  <label class="text-right col-sm-2 control-label">Average<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->average ?? ''}}" placeholder="Only in number" name="average" min="0" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Poor<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->poor ?? ''}}" placeholder="Only in number" name="poor" min="0" required="">
                  </div>

                  <label class="text-right col-sm-2 control-label">Terrible<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" value="{{$hotel->ratingMaster->terrible ?? ''}}" placeholder="Only in number" name="terrible" min="0" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Sleep Quality</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="sleep_quality">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}" @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->sleep_quality==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label class="text-right col-sm-2 control-label">Location<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control" name="location" required="">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}"  @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->location==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Rooms</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="rooms">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}" @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->rooms==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label class="text-right col-sm-2 control-label">Service<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control" name="service" value="{{old('service')}}" required="">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}"  @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->service==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="text-right col-sm-2 control-label">Value<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control" name="value" required="">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}"  @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->value==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>

                  <label class="text-right col-sm-2 control-label">Cleanliness<span class="text-red">*</span></label>
                  <div class="col-sm-3">
                    <select class="form-control" name="cleanliness" required="">
                      <option value="">Choose rating...</option>
                      @foreach($ratingImage as $ri_val)
                        <option value="{{$ri_val->id}}" @if(isset($hotel->ratingMaster) && $hotel->ratingMaster->cleanliness==$ri_val->id) selected  @endif>{{$ri_val->rating}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                    
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                    {{ __('UPDATE') }}
                </button>
              </div>
            </div>

        </form>
      </div>
    </section>



    {{-- ==================================================== --}}
    {{-- ====================ADD HOTELS===================== --}}
    {{-- ==================================================== --}}
    @else
      <section class="content-header">
        <h1>
          Add Hotel
          <small><i class="fa fa-Hotel"></i></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Hotel</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        {{-- ====error message=== --}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
          @endforeach
        @endif
        {{-- ====error message=== --}}
        <div class="row">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Hotel</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Hotel Location <span class="text-red">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="location_id" required>
                          <option value="">Choose...</option>
                          @foreach($location as $result)
                            <option value="{{$result['id']}}">{{$result['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <a href="{{route('admin.location')}}" target="_blank"><button type="button" class="btn btn-info">Add New Location</button></a>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Name<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{old('name')}}" placeholder="For Ex: Villas of Grand Cypress" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Image <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" placeholder="Upload Image" value="{{old('image')}}" name="image" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Price<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Hotel Price" value="{{old('price')}}" name="price" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nights/Duration<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{old('days')}}" placeholder="Hotel Days" name="days" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Set Save Amount</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="{{old('saving')}}" placeholder="For Ex:- You Save £89" name="saving">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">hotel_rating <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control" name="c_hotel_rating" value="{{old('c_hotel_rating')}}" required>
                      <option value="">Choose...</option>
                      @foreach($hotel_rating as $kii =>$val)
                        <option value="{{$kii}}">{{$val}} Star</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Type<span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control hotel_type" name="type" value="{{old('type')}}" required="">
                      <option value="">Choose...</option>
                      @foreach($hotel_type as $kii =>$val)
                        <option value="{{$kii}}">{{$val}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group disneyResort" style="display: none;">
                  <label class="col-sm-2 control-label">Select Disney Resort Type</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="disney_resort_id">
                      <option value="">~~Select Disney Resort~~</option>
                      @foreach($disneyResortType as $drtData)
                        <option value="{{$drtData->id}}">{{$drtData->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                </div>
              </div>

          {{-- ===============ADD HOTELS DETAILS================ --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Hotel Details</h3>
            </div>
            <div class="box-body">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Multiple Image<span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Upload Image" value="{{old('multi_images[]')}}" name="multi_images[]" multiple required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripton<span class="text-red">*</span></label> 
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" rows="4" placeholder="Enter ..." required>{{old('description')}}</textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Facilities<span class="text-red">*</span></label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="facility[]" multiple="multiple" data-placeholder="Select Facility" required>
                        @foreach($facility as $faciResult)
                          <option value="{{$faciResult->id}}">{{$faciResult->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>    
                </div>
                <div class="col-sm-2">
                  <a href="{{route('admin.facility')}}" target="_blank"><button type="button" class="btn btn-info">Add New Facility</button></a>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Latitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="{{old('latitude')}}" placeholder="Enter latitude" name="latitude">
                </div>
                <label class="col-sm-2 control-label">Longitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="{{old('longitude')}}" placeholder="Enter longitude" name="longitude">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Meal Plan Master </label>
                <div class="col-sm-10">
                  <select class="form-control select2" name="board">
                    <option value="">Choose..</option>
                    @foreach($meal as $m_val)
                    <option value="{{$m_val['id']}}">{{$m_val['meal_name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Guests</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{old('guests')}}" placeholder="Enter Guests" name="guests">
                </div>
              </div>
              <div class="form-group results-div">
                <label class="col-sm-2 control-label">Add Nearby Place</label>
                <div class="col-sm-8">
                  <input type="text" name="nearby[]" value="{{old('nearby[]')}}" class="form-control add-form" placeholder="Add Nearby Palce">
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary add-more" onclick="moreuniversity($(this))">Add More</button>
                </div><br><br>
              </div>
              <div class="form-group dept-date">
                <label class="col-sm-2 control-label">Depature Date</label>
                <div class="col-sm-8">
                  <input type="date" name="departure_date[]" value="{{old('departure_date[]')}}" class="form-control add-dept" placeholder="Enter Departure Date">
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary add-more-dept" onclick="depatureDate($(this))">Add More</button>
                </div><br><br>
              </div>
              <div class="form-group airport-div">
                <label class="col-sm-2 control-label">Airport</label>
                <div class="col-sm-10">
                  <select class="form-control airportMaster select2" multiple="multiple" name="airport[]">
                  </select>
                </div>
              </div>

              <div class="form-group airport-div">
                <label class="col-sm-2 control-label">Airline</label>
                <div class="col-sm-10">
                  <select class="form-control airlineMaster select2" multiple="multiple" name="airline[]">
                  </select>
                </div>
              </div>

            </div>
          </div>

          {{-- ========== CREATE HOTEL RATING ========= --}}
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add TA Ratings</h3>
            </div>
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-3 control-label">Number Of Hotel Rating <span class="text-red">*</span></label>
                <div class="col-sm-5">
                  <select class="form-control" name="rating" value="{{old('rating')}}" required="">
                    <option value="">Choose hotel rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Total Review<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" value="{{old('total_review')}}" placeholder="Only in number" name="total_review" min="0" required="">
                </div>

                <label class="col-sm-2 control-label">Excelent Review<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" value="{{old('excellent')}}" placeholder="Only in number" name="excellent" min="0" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Very Good<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" value="{{old('very_good')}}" placeholder="Only in number" name="very_good" min="0" required="">
                </div>

                <label class="col-sm-2 control-label">Average<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" min="0" value="{{old('average')}}" placeholder="Only in number" name="average" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Poor<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" min="0" value="{{old('poor')}}" placeholder="Only in number" name="poor" required="">
                </div>

                <label class="col-sm-2 control-label">Terrible<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" min="0" value="{{old('terrible')}}" placeholder="Only in number" name="terrible" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sleep Quality</label>
                <div class="col-sm-3">
                  <select class="form-control" name="sleep_quality" value="{{old('sleep_quality')}}">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>

                <label class="col-sm-2 control-label">Location<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <select class="form-control" name="location" value="{{old('location')}}" required="">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Rooms</label>
                <div class="col-sm-3">
                  <select class="form-control" name="rooms" value="{{old('rooms')}}">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>

                <label class="col-sm-2 control-label">Service<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <select class="form-control" name="service" value="{{old('service')}}" required="">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Value<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <select class="form-control" name="value" value="{{old('value')}}" required="">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>

                <label class="col-sm-2 control-label">Cleanliness<span class="text-red">*</span></label>
                <div class="col-sm-3">
                  <select class="form-control" name="cleanliness" value="{{old('cleanliness')}}" required="">
                    <option value="">Choose rating...</option>
                    @foreach($ratingImage as $ri_val)
                      <option value="{{$ri_val->id}}">{{$ri_val->rating}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                  
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('ADD NEW') }}
              </button>
            </div>
          </div>

        </form>
      </div>
    </section>
  @endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    function moreuniversity(obj) {    
    $(".results-div").append('<div class="remove-div"><div class="col-sm-8 col-sm-offset-2"><input type="text" name="nearby[]" class="form-control" placeholder="Add Nearby Place With KM"></div><div class="col-sm-2" ><button type="button" class="btn btn-danger remove" onclick="remove($(this))">X</button></div></div>');  
    }
    function remove(obj) {
      obj.parents('div.remove-div').remove();
    }

    function depatureDate(obj) {    
    $(".dept-date").append('<div class="remove-dept"><div class="col-sm-8 col-sm-offset-2"><input type="date" name="departure_date[]" class="form-control" placeholder="Enter Departure Date"></div><div class="col-sm-2" ><button type="button" class="btn btn-danger remove-dept" onclick="removeDept($(this))">X</button></div></div>');  
    }
    function removeDept(obj) {
      obj.parents('div.remove-dept').remove();
    }

    function airport(obj) {    
    $(".airport-div").append('<div class="remove-airport"><div class="col-sm-8 col-sm-offset-2"><input type="text" name="airport[]" class="form-control" placeholder="Enter Airport Name"></div><div class="col-sm-2" ><button type="button" class="btn btn-danger remove-dept" onclick="removeAirport($(this))">X</button></div></div>');  
    }
    function removeAirport(obj) {
      obj.parents('div.remove-airport').remove();
    }
  </script>

@endsection