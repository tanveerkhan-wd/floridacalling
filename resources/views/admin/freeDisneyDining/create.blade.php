@extends('admin.layout.admin-base')
@section('title', 'Update Disney Dining')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Disney Dining
        <small><i class="fa fa-cutlery"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Disney Dining</li>
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
      <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Disney Dining Content</h3>
          </div>
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Insert Image" name="cimage">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                  <img class="img-thumbnail" src="{{asset('storage/'.$freeddc->image)}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Tilte" name="title" value="{{$freeddc->title}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sub Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter Sub Tilte" name="sub_title" value="{{$freeddc->sub_title}}">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Disney Resort</label>
                <div class="col-sm-10">
                  <select class="form-control" name="url" required>
                    <option value="{{$freeddc->url}}">~~Choose Disney~~</option>
                    @foreach($disneyResort as $result)
                      <option value="{{$result->id}}">{{$result->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            
        </div>
      </div>
      <div class="row">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Disney Dining Heading</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Insert Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" placeholder="Insert Image" name="timage">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-3">
                <img class="img-thumbnail" src="{{asset('storage/'.$freeddt->image)}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Tilte" name="ttitle" value="{{$freeddt->title}}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Sub Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Sub Tilte" name="tsub_title" value="{{$freeddt->sub_title}}">
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('UPDATE') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection