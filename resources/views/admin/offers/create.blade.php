@extends('admin.layout.admin-base')
@section('title', 'add Offers')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Offers
        <small><i class="fa fa-Offers"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Offers</li>
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
            <h3 class="box-title">Add Offers</h3>
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
                <label class="col-sm-2 control-label">Select Hotels</label>
                <div class="col-sm-10">
                  <select class="form-control" name="hotel_id" required>
                    <option value="" selected>~~SELECT HOTELS~~</option>
                    @foreach($hotel as $result)
                      <option value="{{$result->id}}">{{$result->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Offer Title" name="title" value="">
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