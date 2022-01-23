@extends('admin.layout.admin-base')
@section('title', 'Offer')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Offer's
        <small><i class="fa fa-Offer"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Offer Listing</li>
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
              <h3 class="box-title">Offer Listing</h3>
              <div class="box-tools pull-right">
                <a href="{{route('admin.offer.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD New Offers</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center" id="example1">
                <thead>
                  <th>#</th>
                  <th>Hotel</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($offer as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td>{{ $getData->hotel->name }}</td>
                    <td><img class="img-thumbnail" src="{{asset('storage/'.$getData->image)}}" style="height: 200px;"></td>
                    <td>{{ $getData->title }}</td>
                    <td>{{ substr($getData->description,0,100) }}..</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('admin.offer.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT Location DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      @if($getData->status==1)
                        <a href="{{ route('admin.offer.status',$getData->id) }}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.offer.status',$getData->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.offer.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">NO DATA FOUND</td>
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