@extends('admin.layout.admin-base')
@section('title', 'Parks & Ticket')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Parks & Ticket
        <small><i class="fa fa-location"></i></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Parks & Ticket</li>
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
            <h3 class="box-title">Edit Parks & Ticket</h3>
          </div>
            <form  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-2 control-label">Insert Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" placeholder="Insert Image" name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                  <img class="img-thumbnail" src="{{asset('storage/'.$passes->image)}}" style="height: 200px;">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="location">
                      <option value="{{$passes->location}}">{{$passes->location}}</option>
                      <option value="disney">Disney</option>
                      <option value="universal">Universal</option>
                      @foreach($location as $locResult)
                        <option value="{{$locResult->base_name}}">{{$locResult->base_name}}</option>
                      @endforeach
                      @foreach($locations as $locResul)
                        <option value="{{$locResul->name}}">{{$locResul->name}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{$passes->title}}" name="title">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Start Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{$passes->price}}" name="price">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Days</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{$passes->days}}" name="days">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Number of Passes</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{$passes->no_of_passes}}" name="number_of_Passes">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" rows="3" class="form-control" placeholder="Enter description Here..">{{$passes->description}}</textarea>
                </div>
              </div>
              <div class="form-group results-div">
                  @php
                    $whatInclude=json_decode($passes->what_included);
                  @endphp
                  @if(!empty($whatInclude))
                  @foreach($whatInclude as $key=>$included)
                  <div class="remove-div">
                    @if($key==0)<label class="col-sm-2 control-label">Add Nearby Place</label>@endif
                    <div class="@if($key!=0) col-sm-offset-2 @endif col-sm-8">
                      <input type="text" name="what_include[]" value="{{$included}}" class="form-control" placeholder="Add What Include">
                    </div>
                    <div class="col-sm-2" >
                      <button type="button" class="btn btn-danger remove" onclick="remove($(this))">X</button>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Include More</label>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-primary add-more" onclick="more($(this))">Add More</button>
                  </div><br>
                </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">
                  {{ __('UPDATE') }}
              </button>
            </div>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
  function more(obj) {    
    $(".results-div").append('<div class="remove-div"><div class="col-sm-8 col-sm-offset-2"><input type="text" name="what_include[]" class="form-control" placeholder="Add New"></div><div class="col-sm-2" ><button type="button" class="btn btn-danger remove" onclick="remove($(this))">X</button></div></div>');  
    }
    function remove(obj) {
      obj.parents('div.remove-div').remove();
    }
  </script>
  <!-- /.content-wrapper -->
@endsection