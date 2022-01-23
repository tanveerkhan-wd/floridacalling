@extends('admin.layout.admin-base')
@section('title', 'Upload CSV')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload CSV
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload CSV</li>
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
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Upload CSV</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-12 control-label" style="text-align: left;"><span class="text-red">*</span>Important things to remember before creating CSV file:</label> 
                <label class="col-sm-12 control-label" style="text-align: left;">1. Ta Rating Id Should Be(Rating, RatingId) Please Pass RatingId in Csv file(eg:6): 
                  @foreach($ratingImage as $ri_val)
                      {{$ri_val->rating}} = {{$ri_val->id}}, &nbsp;&nbsp;&nbsp;&nbsp;
                  @endforeach
                </label>
              </div>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Select CSV File:</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="csv" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Csv Sample File:</label>
                <div class="col-sm-10" style="padding: 10px;">
                  <a href="{{asset('/sample_csv/hotel_sample_csv.csv')}}" download>Download CSV Sample File</a>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('ADD NEW') }}
              </button>
            </div>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection