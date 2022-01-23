@extends('admin.layout.admin-base')
@section('title', 'Hotels')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotels
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hotels Listing</li>
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
              <div class="col-md-2">
                <h3 class="box-title">Hotels Listing</h3>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input class="form-control" placeholder="Search Hotels and Location.." name="search" type="text">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-2">
                <a href="{{route('admin.hotel.csv')}}" class="btn btn-primary"><i class="fa fa-file"></i> Upload CSV</a>
              </div>

              <div class="col-md-2">
                <a href="{{route('admin.hotel.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD New Hotel</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive mt-5">
              <table class="table table-hover text-center" id="myTable">
                <thead>
                  <th>#</th>
                  <th>Location</th>
                  <th>Hotel</th>
                  <th>Image</th>
                  <th>Price, Days & Savings</th>
                  <th>Type</th>
                  <th>Hot Deals</th>
                  <th>Favourite</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($hotel as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td>{{ $getData->location->name }}</td>
                    <td>{{ $getData->name }}</td>
                    <td><img class="img-thumbnail" src="@if($getData->image) {{ asset('uploads/'.$getData->image) }} @else {{ asset('img/.no_image.png') }} @endif" style="height: 100px;"></td>
                    <td> £{{ $getData->price }} For {{ $getData->days }} Days<br>You Save £{{ $getData->saving }} </td>
                    
                    <td>
                      <span class="label label-info">
                        {{ Config::get('constant.hotel_type')[$getData->type] }}
                      </span>
                    </td>
                    <td>
                      <span class="label @if($getData->hot_deal==1) label-warning @else label-danger @endif">
                        @if($getData->hot_deal==1)Active</i>
                        @else Not Acive @endif
                      </span>
                    </td>
                    <td>
                      <span class="label label-danger">
                        @if($getData->fav==1)<i class="fa fa-heart-o"></i>  
                        @else <i class="fa fa-ban"></i> @endif
                      </span>
                    </td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('admin.hotel.edit',$getData->id) }}" data-toggle="tooltip" title="EDIT HOTEL DETAILS" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      @if($getData->status==1)
                        <a href="{{ route('admin.hotel.status',$getData->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.hotel.status',$getData->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      @if($getData->hot_deal==1)
                        <a href="{{ route('admin.hotel.hotDeals',$getData->id) }}"  data-toggle="tooltip" title="Remove Hot Deal Tag" class="btn btn-danger"> <i class="fa fa-fire"></i></a>
                      @elseif($getData->hot_deal==0)
                        <a href="{{ route('admin.hotel.hotDeals',$getData->id) }}" data-toggle="tooltip" title="Add Hot Deal Tag"  class="btn btn-warning"> <i class="fa fa-fire"></i></a>
                      @endif
                      <br><br>

                      @if($getData->fav==1)
                        <a href="{{ route('admin.hotel.fav',$getData->id) }}" data-toggle="tooltip" title="Remove Favourite" class="btn btn-danger"> <i class="fa fa-heart-o"></i></a>
                      @elseif($getData->fav==0)
                        <a href="{{ route('admin.hotel.fav',$getData->id) }}" data-toggle="tooltip" title="Set Favourite Stay" class="btn btn-success" > <i class="fa fa-heart"></i></a>
                      @endif
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.hotel.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      {{-- <a href="{{ route('admin.hotel.view',$getData->id) }}" data-toggle="tooltip" title="See Hotel Details" class="btn btn-success"> <i class="fa fa-info"></i></a> --}}
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
              </table>
            </div>
            {{ $hotel->links() }}
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