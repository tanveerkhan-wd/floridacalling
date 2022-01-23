@extends('admin.layout.admin-base')
@section('title', 'Edit Mix It Up')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Mix It Up
        <small><i class="fa fa-Mix It Up"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Mix It Up</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      {{-- ====error message=== --}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
          @endforeach
        @endif
        {{-- ====error message=== --}}
      {{-- ====error message=== --}}
      <div class="row">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Mix It Up</h3>
          </div>
            <form  class="form-horizontal" action="" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Enter Mix It Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Mix It Up Name" name="name" value="{{$mixItUp->name}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Edit Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: In number" name="price" value="{{$mixItUp->price}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Saving Amount</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: How much customer save" name="save" value="{{$mixItUp->save}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Set First Hotel Nights</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: 7 Nights" name="fh_night" value="{{$mixItUp->fh_night}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Set Second Hotel Nights</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: 3 Nights" name="sh_night" value="{{$mixItUp->sh_night}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">If Any Offer</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="For Ex: something free or helpful" name="desc_title" value="{{$mixItUp->desc_title}}">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Descripton</label> 
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter ...">{{$mixItUp->description}}</textarea>
                  </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('Edit NEW') }}
              </button>
            </div>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection