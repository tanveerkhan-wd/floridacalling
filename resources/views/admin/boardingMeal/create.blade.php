@extends('admin.layout.admin-base')
@section('title', 'Add Meal')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Meal
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Meal</li>
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
              <h3 class="box-title">Add Meal</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Meal Code </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{old('name')}}" placeholder="Add Meal Code" name="meal_code">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Meal Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Add Meal Name" value="{{old('price')}}" name="meal_name">
                  </div>
                </div>
              </div>
              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('ADD NEW') }}
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