@extends('admin.layout.admin-base')
@section('title', 'Disney Resort')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Disney Resort
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Disney Resort</li>
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
              <h3 class="box-title">Disney Resort</h3>
              <div class="box-tools pull-right">
                 <a href="{{route('admin.disneyResort.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD Disney Resort</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Image</th>
                  <th>Resort Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($dr as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td><img src="{{asset('storage/'.$getData->image)}}" style="max-width:200px;height:130px;"></td>
                    <td>{{ $getData->title }}</td>
                    <td>{{ $getData->price }}</td>
                    <td>{{ $getData->description }}</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      @if($getData->status==1)
                        <a href="{{ route('admin.disneyResort.status',$getData->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.disneyResort.status',$getData->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a href="{{ route('admin.disneyResort.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.disneyResort.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
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