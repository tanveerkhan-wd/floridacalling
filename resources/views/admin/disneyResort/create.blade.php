@extends('admin.layout.admin-base')
@section('title', 'Add Disney Resort')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(empty($disneyResort))
    <section class="content-header">
      <h1>
        Add Disney Resort
        <small><i class="fa fa-fort-awesome"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Disney Resort</li>
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
            <h3 class="box-title">Add Disney Resort</h3>
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
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Price" name="price" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" placeholder="Enter Sub Tilte" name="description"></textarea>
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
    @endif

    @if(!empty($disneyResort))
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Disney Resort
        <small><i class="fa fa-fort-awesome"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Disney Resort</li>
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
            <h3 class="box-title">Edit Disney Resort</h3>
          </div>
            <form  class="form-horizontal" action="{{route('admin.disneyResort.edit',$disneyResort->id)}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control"  name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                  <img class="img-thumbnail" src="{{asset('storage/'.$disneyResort->image)}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{$disneyResort->title}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" value="{{$disneyResort->price}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description">{{$disneyResort->description}}</textarea>
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
    @endif


  </div>
  <!-- /.content-wrapper -->
@endsection