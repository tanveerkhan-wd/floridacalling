@extends('admin.layout.admin-base')
@section('title', 'Hotel Facility')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotel Facility
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hotel Facility</li>
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
            <div class="row">
              <div class="col-sm-8 col-md-8">
                <h3 class="box-title">Hotel Facility</h3>
              </div>
              <div class="col-sm-2 col-md-2">
                <a href="{{route('admin.facility.createWithCsv')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Upload With CSV</a>
              </div>
              <div class="col-sm-2 col-md-2">
                <a href="{{route('admin.facility.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD New Facility</a>
              </div>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Icon</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($facility as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td><img class="img-thumbnail" src="@if($getData->icon) {{ asset('uploads/'.$getData->icon) }} @else {{ asset('img/no_image.png') }} @endif" style="height: 100px;"></td>
                    <td>{{ $getData->name }}</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>

                      <a href="{{ route('admin.facility.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      @if($getData->status==1)
                        <a href="{{ route('admin.facility.status',$getData->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.facility.status',$getData->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Delete Facility')" href="{{route('admin.facility.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
              </table>
            </div>
            {{ $facility->links() }}
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