@extends('admin.layout.admin-base')
@section('title', 'Follow')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Follow On
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Follow On</li>
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
            <h3 class="box-title">Update Follow Link</h3>
          </div>
            @if(!empty($follow))
            <form class="form-horizontal" action="{{route('admin.follow-on.update',$follow->id)}}" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="facebook" value="{{$follow->facebook}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Instagram</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="instagram" value="{{$follow->instagram}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="twitter" value="{{$follow->tweet}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Linkedin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pinterest" value="{{$follow->pinterest}}">
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
@endsection