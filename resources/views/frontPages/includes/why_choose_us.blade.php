
<!-- Features Section -->
<div class="container text-center space-1">
    <!-- Title -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1">
        <h2 class="section-title text-black font-size-30 font-weight-bold">Why Choose Us</h2>
    </div>
    <!-- End Title -->
    <!-- Features -->
    <div class="mb-8">
        <div class="row">
            <!-- Icon Block -->
            @foreach($sliderInfo as $val)
                @if($val->type==2)
                    <div class="col-md-4">
                        <img src="uploads/{{$val->image}}" alt="Why Us Image" class="img-fluid" style="height:128px;width: 128px;">
                        <h5 class="font-size-17 text-dark font-weight-bold mb-2"><a href="#">{{$val->title}}</a></h5>
                        <p class="text-gray-1 px-xl-2 px-uw-7">{{$val->description}}</p>
                    </div>
                @endif
            @endforeach
            <!-- End Icon Block -->
        </div>
    </div>
    <!-- End Features -->
</div>
<!-- End Features Section -->