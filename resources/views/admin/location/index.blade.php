@extends('admin.layout.admin-base')
@section('title', 'Location')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Location's
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Location Listing</li>
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
              <h3 class="box-title">Location Listing</h3>
              <div class="box-tools pull-right">
                <a href="{{route('admin.create.location')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD New Location</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Image</th>
                  <th>Location Name</th>
                  <th>Parent Location</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($location as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td><img class="img-thumbnail" src="@if($getData->image){{asset('uploads/'.$getData->image)}} @else {{asset('img/no_image.png')}} @endif" style="height: 90px;"></td>
                    <td>{{ $getData->name }}</td>
                    <td>{{ $getData->parent->name ?? 'NA'}}</td>
                    <td>{{ substr($getData->description,0,100) }}..</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('admin.location.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT Location DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      @if($getData->status==1)
                        <a href="{{ route('admin.location.status',$getData->id) }}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.location.status',$getData->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.location.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
              </table>
              {{ $location->links() }}
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