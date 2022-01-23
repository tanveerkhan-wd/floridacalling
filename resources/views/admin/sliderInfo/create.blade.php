@extends('admin.layout.admin-base')
@section('title', 'Slider Info')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(empty($slider))
    <section class="content-header">
      <h1>
        Add Slider Info
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Slider Info</li>
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
            <h3 class="box-title">Add Slider Info</h3>
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
                <label class="col-sm-2 control-label">Add New Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Title Name" name="title" value="{{old('title')}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Add Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="desc">{{old('desc')}}</textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Add Type</label>
              <div class="col-sm-10">
                <select class="form-control" name="type" required>
                  <option value="1" selected>Slider Content</option>
                  <option value="2">Love Florida</option>
                </select>
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
    @elseif(!empty($slider))
    <section class="content-header">
      <h1>
        Edit Slider Info
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Slider Info</li>
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
            <h3 class="box-title">Edit Slider Info</h3>
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
                  <img class="img-thumbnail" src="{{asset('uploads/'.$slider->image)}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Add New Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Title Name" name="title" value="{{$slider->title}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Add Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="desc">{{$slider->description}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Add Type</label>
                <div class="col-sm-10">
                  <select class="form-control" name="type" required>
                    <option value="{{$slider->type}}" selected>@if($slider->type==1) Slider Content @elseif($slider->type==2)Love Florida @endif</option>
                    <option value="1">Slider Content</option>
                    <option value="2">Love Florida</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('UPDATE') }}
              </button>
            </div>
            </form>
        </div>
      </div>
    </section>
    @endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection