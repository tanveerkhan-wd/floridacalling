@extends('admin.layout.admin-base')
@section('title', 'Static Page')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(empty($page))
    <section class="content-header">
      <h1>
        Add Static Pages
        <small><i class="fa fa-user"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Static Pages</li>
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
            <h3 class="box-title">Add Static Pages</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Page Type</label>
                <div class="col-sm-10">
                  <select class="form-control" name="page_type" required>
                      <option value="1"> Terms & Condition </option>
                      <option value="2"> Privacy Policy </option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title" value="">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="descri" placeholder="" name="description"></textarea>
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

    @if(!empty($page))
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Static Pages
        <small><i class="fa fa-user"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Static Pages</li>
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
            <h3 class="box-title">Edit Static Pages</h3>
          </div>
            <form  class="form-horizontal" action="" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Page Type</label>
                <div class="col-sm-10">
                  <select class="form-control" name="page_type" required>
                    <option value="{{$page->type}}" selected>@if($page->type==1) Terms & Condition @else Privacy Policy @endif </option>
                      <option value="1"> Terms & Condition </option>
                      <option value="2"> Privacy Policy </option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{$page->title}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="descri" name="description">{{$page->description}}</textarea>
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
  <script src="https:////cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace( 'descri' );
  </script>
  <!-- /.content-wrapper -->
@endsection