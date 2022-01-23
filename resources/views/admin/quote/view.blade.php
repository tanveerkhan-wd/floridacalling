@extends('admin.layout.admin-base')
@section('title', 'View Quotes')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Quotes
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Quotes</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      {{-- ====error message=== --}}
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
            <strong>Error </strong>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $error }}
          </div>
        @endforeach
      @endif
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ $message }}
        </div>
      @endif
      {{-- ====error message=== --}}
      <div class="row">
        <form class="form-horizontal">
          <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">View All Enquiry Details</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->name?$quote->name:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->email?$quote->email:'---'}}" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Phone Number</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->phone_number?$quote->phone_number:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Enquiry Type</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="@if($quote->enquiry_type==1) Generel Enquiry @else Quote @endif" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Message</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3">{{$quote->message?$quote->message:'---'}}</textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label label-danger" style="border-radius: 4px;">Other Details</label>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Hotel Destinations</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->hotel_destination?$quote->hotel_destination:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Holiday Type</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->holiday_type?$quote->holiday_type:'---'}}" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adults</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->adults?$quote->adults:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Children</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->children?$quote->children:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Infants</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->infants?$quote->infants:'---'}}" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Transport Required</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->transport_req?$quote->transport_req:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Accommodation Type</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->accommodation_type?$quote->accommodation_type:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Number of Stops</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->number_stops?$quote->number_stops:'---'}}" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Preferred Cruise</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->preferred_cruise?$quote->preferred_cruise:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Cabin Type</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->cabin_type?$quote->cabin_type:'---'}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Flexible Date</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" value="{{$quote->flexible_date?$quote->flexible_date:'---'}}" readonly>
                  </div>
                </div>                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Departure Date</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->departure_date}}" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Flying From</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$quote->flying_from}}" readonly>
                  </div>
                </div>

            </div>
          </div>
        </form>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection