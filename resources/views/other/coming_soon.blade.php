@extends('layouts.subPageBase')
@section('title','Coming Soon')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
    <div class="border-bottom border-color-8 mb-8">
        <div class="container">
            <div class="row mb-5 mb-md-7 mb-lg-0">
                <div class="col-12">
                    <div class="text-center">
                        <div class="display-4 font-weight-bold">Coming Soon</div>
                        <h6 class="font-size-21 font-weight-bold text-gray-3 mb-3 text-center">This page is under construction.</h6>
                        <p class="text-gray-1 mb-3 mb-lg-5 pb-lg-1 text-center">For more conatct us <strong>{{$contact->phone_number ?? ''}}</strong></p>
                        <a href="{{url('/')}}" class="btn btn-primary rounded-xs transition-3d-hover font-weight-bold min-width-190 min-height-60 d-inline-flex flex-content-center">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection