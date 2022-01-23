@extends('admin.layout.admin-base')
@section('title', 'Boarding Meal')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Boarding Meal
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Boarding Meal Listing</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      {{-- ====error message=== --}}
      @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ $message }}
        </div>
      @endif
      {{-- ====error message=== --}}
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
              <h3 class="box-title">Boarding Meal Listing</h3>
              <div class="box-tools pull-right">
                <a href="{{route('admin.boarding.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD New</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive mt-5">
              <table class="table table-hover text-center" id="myTable">
                <thead>
                  <th>#</th>
                  <th>Meal Code</th>
                  <th>Meal Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($meal as $key=> $getData)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$getData->meal_code}}</td>
                    <td>{{$getData->meal_name}}</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active</i>
                        @else Not Active @endif
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('admin.boarding.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT Boarding Meal" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                      @if($getData->status==1)
                        <a href="{{ route('admin.boarding.status',$getData->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.boarding.status',$getData->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif

                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.boarding.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
         </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection