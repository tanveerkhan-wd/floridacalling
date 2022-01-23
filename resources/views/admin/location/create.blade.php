@extends('admin.layout.admin-base')
@section('title', 'add location')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Location
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Location</li>
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
      {{-- ====error message=== --}}
      <div class="row">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Add Location</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                  <label class="col-sm-2 control-label">Select Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" placeholder="Upload Image" name="image">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Enter Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Parent Location</label>
                <div class="col-sm-10">
                  <select class="form-control" name="parent_category">
                    <option value="">Choose...</option>
                    @foreach($getLocData as $getData)
                      <option value="{{$getData['id']}}">{{$getData['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Descripton</label> 
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter ..."></textarea>
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