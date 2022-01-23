@extends('admin.layout.admin-base')
@section('title', 'Add Mix It Up')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Mix It Up
        <small><i class="fa fa-Mix It Up"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Mix It Up</li>
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
            <h3 class="box-title">Add Mix It Up</h3>
          </div>
            <form  class="form-horizontal" action="" method="post">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Select First Hotel</label>
                <div class="col-sm-10">
                  <select class="form-control" name="fh_id" required>
                    <option value="">~~ Select Hotel ~~</option>
                    @foreach($hotel as $result)
                      <option value="{{$result->id}}">{{$result->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Select Second Hotel</label>
                <div class="col-sm-10">
                  <select class="form-control" name="sh_id" required>
                    <option value="">~~ Select Hotel ~~</option>
                    @foreach($hotel as $result)
                      <option value="{{$result->id}}">{{$result->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Enter Mix It Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Mix It Up Name" name="name" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Add Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: In number" name="price">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Saving Amount</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: How much customer save" name="save">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Set First Hotel Nights</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: 7 Nights" name="fh_night">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Set Second Hotel Nights</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" placeholder="For Ex: 3 Nights" name="sh_night">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">If Any Offer</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="For Ex: something free or helpful" name="desc_title">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Descripton</label> 
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter ..."></textarea>
                  </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('ADD NEW') }}
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