@extends('admin.layout.admin-base')
@section('title', 'explore Florida')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(!empty($id))
    <section class="content-header">
      <h1>
        Edit Explore Florida
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Explore Florida</li>
      </ol>
    </section>
    @else
    <section class="content-header">
      <h1>
        Add Explore Florida
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Explore Florida</li>
      </ol>
    </section>
    @endif
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
          @if(!empty($id))
          <div class="box-header with-border">
            <h3 class="box-title">Edit Explore Florida</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Insert Image" name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                  <img class="img-thumbnail" src="{{asset('storage/public/hotel/'.basename($id->image))}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title" value="{{$id->title}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Start Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="Enter Price" name="price" value="{{$id->price}}">
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('UPDATE') }}
              </button>
            </div>
            </form>
            @else
            <div class="box-header with-border">
              <h3 class="box-title">Add Explore Florida</h3>
            </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Insert Image" name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Start Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="Enter Price" name="price">
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('UPDATE') }}
              </button>
            </div>
            </form>
            @endif
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection