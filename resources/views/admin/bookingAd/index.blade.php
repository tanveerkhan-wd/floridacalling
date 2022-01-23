@extends('admin.layout.admin-base')
@section('title', 'Booking Ads')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Booking Ad
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Booking Ad</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        
      <div class="row">
        {{-- ====error message=== --}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
          @endforeach
        @endif
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $message }}
          </div>
        @endif
        {{-- ====error message=== --}}
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Update Booking Ad</h3>
          </div>
            <form class="form-horizontal" action="{{route('admin.bookingAdd.update',$book->id)}}" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="title" class="form-control" name="title" value="{{$book->title}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripton</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" rows="4">{{ $book->description }}</textarea>
                </div>
              </div>
              </div>
              <div class="box-footer">
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