{{--<li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{url('/')}}">Home</a>
</li> --}}


<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{route('front.hotel.listing')}}?type=Disney">Disney</a>
</li>


<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{route('front.hotel.listing')}}?type=Universal">Universal</a>
</li>

{{-- <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a id="hotelMenu1" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="{{url('hotel-listing')}}" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu">Disney</a>
    
    <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu1" style="min-width: 230px;">
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing')}}">Hotels</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href=""></a>Park Tickets</li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href=""></a>Others Attractions</li>
    </ul>
</li> --}}

{{-- <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a id="hotelMenu2" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="{{url('hotel-listing')}}" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu1">Universal</a>
    <ul id="hotelSubMenu1" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu2" style="min-width: 230px;">
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing')}}">Disney Hotels</a></li>
    </ul>
</li> --}}

<li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a id="hotelMenu3" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="{{url('hotel-listing?location=Florida')}}" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu2">Florida Destinations</a>
    <!-- Hotel Submenu -->
    <ul id="hotelSubMenu2" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu3" style="min-width: 230px;">
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Orlando')}}">Orlando</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Miami')}}">Miami</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Florida Keys')}}">Florida Keys</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=West Palm Beach')}}">West Palm Beach</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Gulf')}}">Gulf Coast</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Fort Fort Lauderdale')}}">Fort Fort Lauderdale</a></li>
    </ul>
    <!-- End Hotel Submenu -->
</li>

<li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a id="hotelMenu4" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="{{url('hotel-listing?location=usa')}}" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu3">USA</a>
    <!-- Hotel Submenu -->
    <ul id="hotelSubMenu3" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu4" style="min-width: 230px;">
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=new york')}}">New York</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Las Vegas')}}">Las Vegas</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=San Francisco')}}">San Francisco</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Los Angeles')}}">Los Angeles</a></li>
        <li><a class="nav-link u-header__sub-menu-nav-link" href="{{url('hotel-listing?location=Disneyland Anaheim')}}">Disneyland Anaheim</a></li>
    </ul>
    <!-- End Hotel Submenu -->
</li>

<!-- Hotel -->
<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{route('front.hotel.listing')}}?type=Hotels">Hotels</a>
</li>

<!-- Hotel -->
<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{route('front.hotel.listing')}}?type=Villas">Villas</a>
</li>

<!-- Hotel -->
<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{url('coming-soon')}}">Parks,Ticket & Passes</a>
</li>
{{-- 
<li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="#">Hot Deals</a>
</li> --}}

<!-- Book Now -->
{{-- <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="{{url('query-form')}}">Book Now</a>
</li>
--}}