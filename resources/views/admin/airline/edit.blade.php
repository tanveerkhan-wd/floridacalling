@extends('admin.layout.admin-base')
@section('title', 'Edit Airline')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Airline
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Airline</li>
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
              <h3 class="box-title">Edit Airline</h3>
            </div>
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Airline Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$id->airline_name}}" name="airline_name">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Airline Icon</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" value="{{$id->airline_icon}}" name="airline_icon">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      @if($id->airline_icon)
                      <img class="img-thumbnail" src="{{ asset('uploads/'.$id->airline_icon) }}" style="height: 100px;">
                      @else
                       <img class="img-thumbnail" src="{{asset('img/no_image.png')}}" style="height: 100px;"> 
                      @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ext</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->ext}}" name="ext">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Airline Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$id->airline_code}}" name="airline_code">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Misc</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->misc}}" name="misc">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Short Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$id->short_code}}" name="short_code">
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