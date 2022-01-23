@extends('admin.layout.admin-base')
@section('title', 'Edit Testimonial')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Testimonial
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/testimonials')}}"> Testimonial</a></li>
        <li class="active">Edit Testimonial</li>
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
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter  Name" name="name" value="{{ $data->name ?? '' }}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="image">
                </div>
                <div class="col-sm-3">
                  <img src="{{ asset('uploads/'.$data->image) }}" class="img-thumbnail"  style="height: 100px;" alt="{{ $data->name ?? ''}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description">{{ $data->description ?? ''}}</textarea>
                </div>
              </div>
            </div>
            <div class="box-footer text-center">
              <button type="submit" class="btn btn-primary">
                  {{ __('Update') }}
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