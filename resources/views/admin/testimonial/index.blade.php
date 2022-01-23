@extends('admin.layout.admin-base')
@section('title', 'Testimonial')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Testimonials
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Testimonial Listing</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      {{-- ====error message=== --}}
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
            <strong>Error </strong>
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
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
              <h3 class="box-title">Testimonial Listing</h3>
              <div class="box-tools pull-right">
                <a href="{{url('admin/testimonial/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Testimonial </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                @forelse($data as $key=>$val)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><img class="img-thumbnail" src="{{ asset('uploads/'.$val->image) }}" style="height: 100px;"></td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->description }}</td>
                    <td>
                      <span class="label @if($val->status==1) label-success @else label-danger @endif">
                        @if($val->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      <a href="{{ url('admin/testimonial/edit',$val->id) }}" data-toggle="tooltip" title="EDIT SLIDER INFO DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      @if($val->status==1)
                        <a href="{{ url('admin/testimonial/status',$val->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($val->status==0)
                        <a href="{{ url('admin/testimonial/status',$val->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{url('admin/testimonial/destroy',$val->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
              </table>
              {{ $data->links() }}
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