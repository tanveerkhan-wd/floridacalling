@extends('admin.layout.admin-base')
@section('title', 'Suggestion')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suggestions
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Suggestion Listing</li>
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
              <h3 class="box-title">Suggestion Listing</h3>
              <div class="box-tools pull-right">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Suggestion</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                @forelse($data as $key=>$val)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->description }}</td>
                    <td>
                      <span class="label @if($val->status==1) label-success @else label-danger @endif">
                        @if($val->status==1)Active 
                        @else Deactive @endif
                      </span>
                    </td>
                    <td>
                      @if($val->status==1)
                        <a href="{{ url('admin/suggestion/status',$val->id) }}" data-toggle="tooltip" title="Deactive Status" class="btn btn-danger"><i class="fa fa-close"></i></a>
                      @elseif($val->status==0)
                        <a href="{{ url('admin/suggestion/status',$val->id) }}" data-toggle="tooltip" title="Active Status" class="btn btn-success"><i class="fa fa-check"></i></a>
                      @endif
                      <a data-toggle="tooltip" title="Delete Record" onclick=" return confirm('Are you sure you want to Kick him Out')" href="{{url('admin/suggestion/destroy',$val->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      
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