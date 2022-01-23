@extends('admin.layout.admin-base')
@section('title', 'Call Back')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Call Back List
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Call Back Listing</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      {{-- ====error message=== --}}
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
              <h3 class="box-title">Call Back Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Code</th>
                  <th>phone Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                {{ $cnt='' }}
                @forelse($callBack as $getData)
                <tr>
                    <td>{{ ++$cnt }}</td>
                    <td>{{ $getData->code }}</td>
                    <td>{{ $getData->number }}</td>
                    <td>
                      <span class="label @if($getData->status==1) label-success @else label-danger @endif">
                        @if($getData->status==1)Approved 
                        @else Pending @endif
                      </span>
                    </td>
                    <td>
                      @if($getData->status==1)
                        <a href="{{ route('admin.callback.status',$getData->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($getData->status==0)
                        <a href="{{ route('admin.callback.status',$getData->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{route('admin.callback.destroy',$getData->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="9" class="text-center">No DATA FOUND</td>
                </tr>
                @endforelse
              </table>
            </div>
            {{ $callBack->links() }}
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