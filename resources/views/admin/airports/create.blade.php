@extends('admin.layout.admin-base')
@section('title', 'Add Airport')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Airport
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Airport</li>
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
        @if ($message = Session::get('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $message }}
          </div>
        @endif
        {{-- ====error message=== --}}
        <div class="row">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Airport</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Airport CSV FILE</label>
                  <div class="col-sm-10">
                    <input type="file" id="airport_csv_file" class="form-control" name="file">
                  </div>
                </div>
              </div>
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('UPLOAD CSV FILE') }}
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