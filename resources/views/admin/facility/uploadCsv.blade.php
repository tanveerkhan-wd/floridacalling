@extends('admin.layout.admin-base')
@section('title', 'Add Facility')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Facility
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Facility</li>
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
            <h3 class="box-title">Add Facility</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Select CSV File</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="file" value="{{old('icon')}}" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Download Sample CSV</label>
                <div class="col-sm-10" style="padding-top: 7px;">
                  <a style="text-decoration: underline;font-weight: bold;font-size: 15px;" href="{{asset('sample_csv/sample_csv.csv')}}" download=""> Download Sample CSV File </a>
                </div>
              </div>
              <div class="row text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Upload CSV File') }}
                </button>
              </div>
            </div>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection