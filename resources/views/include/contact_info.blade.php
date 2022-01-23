@php
    $url = asset('img/call_now_to_book.jpeg');
@endphp

<div class="home_call_now_book container-fluid border-bottom border-color-2 {{-- bg-theme-color --}} text-center space-1 p-0 gradient-overlay-half-bg-grayish-blue" style="background-image:url({{$url}});background-repeat: no-repeat;background-size: cover;background-position: bottom;">
    <div class="text-center m-auto pb-1 d-inline-flex hcnbheader text-white">
            <h2 class="font-size-30 font-weight-normal mr-2 p-2">Call now to book 
            <h1 class="font-size-40 font-weight-bold ml-2"> <a href="tel:{{ $contact->phone_number ?? '' }}" class="text-white">{{$contact->phone_number}}</a></h1></h2>
    </div>
    
    <div class="row mr-0">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3 call-now-right-border">
                    <img src="{{asset('/img/LD.png')}}" alt="Why Us Image" class="img-fluid" style="width: auto;height: 100px;">
                    <h5 class="text-white font-size-20 font-weight-bold mb-2"><a href="#">Low Deposit Holidays</a></h5>
                    <p class="text-white px-xl-2 px-uw-7">Secure your holiday from £49pp*</p>
                </div>
                <div class="col-md-3 call-now-right-border">
                    <img src="{{asset('img/24x7.png')}}" alt="Why Us Image" class="img-fluid" style="width: auto;height: 100px;">
                    <h5 class="text-white font-size-20 font-weight-bold mb-2"><a href="#">24/7 </a></h5>
                    <p class="text-white px-xl-2 px-uw-7">Support</p>
                </div>  
                <div class="col-md-3 call-now-right-border">
                    <img src="{{asset('/img/PIM.png')}}" alt="Why Us Image" class="img-fluid" style="width: auto;height: 100px;">
                    <h5 class="text-white font-size-20 font-weight-bold mb-2"><a href="#">Pay in Monthly</a></h5>
                    <p class="text-white px-xl-2 px-uw-7">Installments</p>
                </div>
                <div class="col-md-3">
                    <img src="{{asset('/img/PTS-LOGO.png')}}" alt="icon" class="img-fluid" style="width: auto;height: 100px;">
                    <h5 class="text-white font-size-20 font-weight-bold mb-2"><a href="https://www.protectedtrustservices.com/services/consumer-protection/">PTS Member</a></h5>
                    <p class="text-white px-xl-2 px-uw-7">Florida Dream Holidays LTD.</p>
                </div>
            </div>
        </div>
    </div>
</div>