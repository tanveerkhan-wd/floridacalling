@extends('admin.layout.admin-base')
@section('title', 'Contact Info')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Contact Information
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Contact Information</li>
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
        {{-- ====error message=== --}}
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Update Contact Information</h3>
          </div>
            @if(!empty($getData))
            <form class="form-horizontal" action="{{route('admin.contactUpdate',$getData->id)}}" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="phone_number" value="{{$getData->phone_number}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{$getData->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Location Address</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="loc" name="location">{!!$getData->location!!}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripton</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" rows="4">
                    {{ $getData->description }}
                  </textarea>
                </div>
              </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
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
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace( 'loc' );
  </script>
@endsection