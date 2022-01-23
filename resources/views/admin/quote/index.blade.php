@extends('admin.layout.admin-base')
@section('title', 'Quotes')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Quotes
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Quotes</li>
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
              <div class="col-md-4">
                <h3 class="box-title">Manage Quotes</h3>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input class="form-control" placeholder="Search Name,Email and Phone.." name="search" type="text">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover text-center">
              <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Message</th>
                <th>Request Type/About</th>
                <th>Viewed/Not</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              {{ $cnt='' }}
              @forelse($quote as $getData)
              <tr>
                  <td>{{ ++$cnt }}</td>
                  <td>{{ $getData->name }}</td>
                  <td>{{ $getData->email }}</td>
                  <td>{{ $getData->phone_number }}</td>
                  <td>{{ $getData->message }}</td>
                  
                  @if($getData->enquiry_type==1)
                    <td><span class="label label-warning"> Enquiry @if(!empty($getData->ref_name)) <b><i class="fa fa-arrows-h"></i></b> {{$getData->ref_name}} @endif</span></td>
                  @elseif($getData->enquiry_type==2)
                    <td><span class="label label-info"> Quote @if(!empty($getData->ref_name))  <b><i class="fa fa-arrows-h"></i> {{$getData->ref_name}} @endif</span></td>
                  @endif

                  <td>
                    <span class="label @if($getData->viewed==1) label-success @else label-danger @endif">
                      @if($getData->viewed==1)Viewed 
                      @else Pending @endif
                    </span>
                  </td>
                  <td>
                    <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                      @if($getData->status==1)Done 
                      @else Not Done @endif
                    </span>
                  </td>
                  <td>
                    @if($getData->status==1)
                      <a href="{{ route('admin.quote.status',$getData->id) }}" data-toggle="tooltip" title="Change Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                    @elseif($getData->status==0)
                      <a href="{{ route('admin.quote.status',$getData->id) }}" data-toggle="tooltip" title="Change Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                    @endif
                    <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Delete')" href="{{route('admin.quote.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br>
                     @if($getData->enquiry_type==2)
                       <a href="{{ route('admin.quote.viewAllData',$getData->id) }}" data-toggle="tooltip" title="View All Data" class="btn btn-info"><i class="fa fa-eye"></i></a>
                     @endif
                  </td>
              </tr>
              @empty
              <tr>
                <td colspan="9" class="text-center">No DATA FOUND</td>
              </tr>
              @endforelse
            </table>
          </div>
          {{ $quote->links() }}
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