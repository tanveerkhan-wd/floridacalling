@extends('admin.layout.admin-base')
@section('title', 'Add Slider')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(!empty($slier))
    <section class="content-header">
      <h1>
        edit Slider
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">edit Slider</li>
      </ol>
    </section>
    @else
    <section class="content-header">
      <h1>
        Add Slider
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Slider</li>
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
          <div class="box-header with-border">
            <h3 class="box-title">@if(!empty($slider)) Edit Slider @else Add Slider @endif</h3>
          </div>
            <form  class="form-horizontal" action="@if(!empty($slider)) {{route('admin.slider.update',$slider->id)}}@endif" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Insert Image" name="image">
                </div>
              </div>
              @if(!empty($slider))
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-2">
                  <img src="{{asset('storage/'.$slider->image)}}" class="img-fluid img-thumbnail"> 
                </div>
              </div>
              @endif
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title" value="@if(!empty($slider)) {{$slider->title}} @else {{old('title')}} @endif">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sub Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Sub Tilte" name="sub_title" value="@if(!empty($slider)) {{$slider->sub_title}} @else {{old('sub_title')}} @endif">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Start Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="Enter Price" name="start_price" value="@if(!empty($slider)){{$slider->start_price}}@else{{old('start_price')}}@endif">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Select Hotel</label>
                <div class="col-sm-10">
                  <select class="form-control" name="hotel_id" required>
                    <option value="@if(!empty($slider)){{$slider->hotel_id}}@else @endif">~~Choose @if(!empty($slider))Another @endif Hotel~~</option>
                    @foreach($hotel as $result)
                      <option value="{{$result->id}}">{{$result->name}}</option>
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
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection