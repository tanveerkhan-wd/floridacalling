@extends('admin.layout.admin-base')
@section('title', 'Edit Rating Image')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Rating Image
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Rating Image</li>
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
              <h3 class="box-title">Edit Rating Image</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label">Rating Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      @if($id->image)
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$id->image) }}" style="height: 100px;">
                      @else
                       <img class="img-thumbnail" src="{{asset('img/no_image.png')}}" style="height: 100px;"> 
                      @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Rating </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->rating}}" name="rating">
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