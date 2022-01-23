@extends('admin.layout.admin-base')
@section('title', 'Edit Airport')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Airport
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Airport</li>
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
              <h3 class="box-title">Edit Airport</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Airport Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$id->airport_name}}" name="airport_name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Airport Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$id->airport_code}}" name="airport_code">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">City Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->city_name}}" name="city_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Country Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->country_name}}" name="country_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Country Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->country_code}}" name="country_code">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->latitude}}" name="latitude">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->longitude}}" name="longitude">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">GMT</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->gmt}}" name="gmt">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Timezone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->timezone}}" name="timezone">
                    </div>
                </div>

              </div>
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection