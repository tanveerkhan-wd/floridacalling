@php
  use App\Quote;
  use App\Hotel;
  $notViewList = Quote::where('enquiry_type',2)->where('viewed','=',0)->count();
  $countHotel = Hotel::count();
@endphp  

  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ (Request::is('admin') ? 'active' : '') }}">
          <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        {{-- <li class="{{ (Request::is('admin/manage-password') ? 'active' : '') }} {{ (Request::is('admin/manage-password/*') ? 'active' : '') }}">
          <a href="{{route('admin.manage-password')}}">
            <i class="fa fa-user-secret"></i>
            <span>Manage Password</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><i class="fa fa-key"></i></span>
            </span>
          </a>
        </li> --}}
{{--         <li class="{{ (Request::is('admin/location') ? 'active' : '')}} {{(Request::is('admin/location/*') ? 'active' : '')}} treeview">
          <a href="#">
            <i class="fa fa-location-arrow"></i>
            <span>Locations</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (Request::is('admin/location') ? 'active' : '')}}"><a href="{{route('admin.location')}}"><i class="fa fa-circle-o"></i> Locatons</a></li>
            <li class="{{ (Request::is('admin/location/sub') ? 'active' : '')}}"><a href="{{route('admin.subLocation')}}"><i class="fa fa-circle-o"></i> Sub Locations</a></li>
          </ul>
        </li> --}}
        <li class="{{ (Request::is('admin/location') ? 'active' : '')}}">
          <a href="{{route('admin.location')}}">
            <i class="fa fa-map-marker"></i>
            <span>Locations</span>
            <span class="pull-right-container">
              {{-- <span class="label label-primary pull-right">{{$countHotel}}
              </span> --}}
            </span>
          </a>
        </li>
        <li class="{{ (Request::is('admin/hotels') ? 'active' : '') }} {{ (Request::is('admin/hotels/*') ? 'active' : '') }}">
          <a href="{{route('admin.hotels')}}">
            <i class="fa fa-home"></i>
            <span>Hotels</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{$countHotel}}
              </span>
            </span>
          </a>
        </li>
        <li class="{{ (Request::is('admin/mix-it-up') ? 'active' : '') }} {{ (Request::is('admin/mix-it-up/*') ? 'active' : '') }}">
          <a href="{{route('admin.mixItUp')}}">
            <i class="fa fa-superpowers"></i>
            <span>Mix It Up</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        
        <li class="{{ (Request::is('admin/quote') ? 'active' : '') }} {{ (Request::is('admin/quote/*') ? 'active' : '') }}">
          <a href="{{route('admin.quote')}}">
            <i class="fa fa-envelope"></i>
            <span>Manage Quote</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">{{$notViewList}}</span>
            </span>
          </a>
        </li>
        
        <li class="treeview {{ (request::is('admin/disney-resort')) || (request::is('admin/disney-resort/*')) || (request::is('admin/parks-passes')) || (request::is('admin/parks-passes/*')) || (request::is('admin/where-to-stay')) || (request::is('admin/where-to-stay/*')) || (request::is('admin/explore-florida')) || (request::is('admin/explore-florida/*')) || (request::is('admin/free-disney-dining')) || (request::is('admin/free-disney-dining/*')) ? 'active' : ''}}">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Other..</span>
            <span class="pull-right-container">
              <span class="label pull-right"><i class="fa fa-angle-right" style="font-size: 18px;"></i></span>
            </span>
          </a>
          <ul class="treeview-menu {{ (request::is('admin/disney-resort')) || (request::is('admin/disney-resort/*')) || (request::is('admin/parks-passes')) || (request::is('admin/parks-passes/*')) || (request::is('admin/where-to-stay')) || (request::is('admin/where-to-stay/*')) || (request::is('admin/explore-florida')) || (request::is('admin/explore-florida/*')) || (request::is('admin/free-disney-dining')) || (request::is('admin/free-disney-dining/*')) ? 'active' : ''}}">

            <li class="{{ (request::is('admin/free-disney-dining')) || (request::is('admin/free-disney-dining/*')) ? 'active' : ''}}"><a href="{{route('admin.freeDisneyDining')}}"><i class="fa fa-circle-o"></i> Free Disney Dining </a></li>

            <li class="{{ (request::is('admin/explore-florida')) || (request::is('admin/explore-florida/*')) ? 'active' : ''}}"><a href="{{route('admin.exploreFlorida')}}"><i class="fa fa-circle-o"></i> Explore Florida </a></li>

            <li class="{{ (request::is('admin/where-to-stay')) || (request::is('admin/where-to-stay/*')) ? 'active' : ''}}"><a href="{{route('admin.whereToStay')}}"><i class="fa fa-circle-o"></i> Where To Stay </a></li>

            <li class="{{(request::is('admin/parks-passes')) || (request::is('admin/parks-passes/*')) ? 'active' : ''}}"><a href="{{route('admin.parksPasses')}}"><i class="fa fa-circle-o"></i> Parks And Passes </a></li>


            <li class="{{(request::is('admin/disney-resort')) || (request::is('admin/disney-resort/*')) ? 'active' : ''}}"><a href="{{route('admin.disneyResort')}}"><i class="fa fa-circle-o"></i> Disney Resort </a></li>

          </ul>
        </li>

        <li class="treeview {{ (request()->is('admin/book-ad')) || (request()->is('admin/book-ad/*')) || (request::is('admin/slider-info')) || (request::is('admin/slider-info/*')) || (request::is('admin/call-back')) || (request::is('admin/call-back/*')) || (request::is('admin/follow-on')) || (request::is('admin/follow-on/*')) || (request::is('admin/contact-info')) || (request::is('admin/contact-info/*')) || (Request::is('admin/static-pages')) || (Request::is('admin/static-pages/*')) || (request::is('admin/offers')) || (request::is('admin/offers/*')) || (request::is('admin/slider')) || (request::is('admin/slider/*')) ? 'active' : ''}}">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Content Management</span>
            <span class="pull-right-container">
              <span class="label pull-right"><i class="fa fa-angle-right" style="font-size: 18px;"></i></span>
            </span>
          </a>
          <ul class="treeview-menu {{ (request()->is('admin/book-ad')) || (request()->is('admin/book-ad/*')) || (request::is('admin/slider-info')) || (request::is('admin/slider-info/*')) || (request::is('admin/call-back')) || (request::is('admin/call-back/*')) || (request::is('admin/follow-on')) || (request::is('admin/follow-on/*')) || (request::is('admin/contact-info')) || (request::is('admin/contact-info/*')) || (Request::is('admin/static-pages')) || (Request::is('admin/static-pages/*')) || (request::is('admin/offers')) || (request::is('admin/offers/*')) || (request::is('admin/slider')) || (request::is('admin/slider/*')) ? 'active' : ''}}">
            
            <li class="{{ (request()->is('admin/book-ad')) || (request()->is('admin/book-ad/*')) ? 'active' : ''}}"><a href="{{route('admin.bookingAdd')}}"><i class="fa fa-circle-o"></i>Booking Ad </a></li>

            <li class="{{(request::is('admin/slider-info')) || (request::is('admin/slider-info/*')) ? 'active' : ''}}"><a href="{{route('admin.sliderinfo')}}"><i class="fa fa-circle-o"></i> About Us Slider </a></li>
            
            <li class="{{(request::is('admin/call-back')) || (request::is('admin/call-back/*')) ? 'active' : ''}}"><a href="{{route('admin.callBack')}}"><i class="fa fa-circle-o"></i> Call Back </a></li>

            <li class="{{(request::is('admin/follow-on')) || (request::is('admin/follow-on/*')) ? 'active' : ''}}"><a href="{{route('admin.follow-on')}}"><i class="fa fa-circle-o"></i> Social Media </a></li>

            <li class="{{(request::is('admin/contact-info')) || (request::is('admin/contact-info/*')) ? 'active' : ''}}"><a href="{{route('admin.contactus')}}"><i class="fa fa-circle-o"></i> Contact Info </a></li>

            <li class="{{(request::is('admin/static-pages')) || (request::is('admin/static-pages/*')) ? 'active' : ''}}"><a href="{{route('admin.staticPages')}}"><i class="fa fa-circle-o"></i> Static Pages </a></li>

            <li class="{{(request::is('admin/offers')) || (request::is('admin/offers/*')) ? 'active' : ''}}"><a href="{{route('admin.contactus')}}"><i class="fa fa-circle-o"></i> Offers </a></li>
            
            <li class="{{(request::is('admin/slider')) || (request::is('admin/slider/*')) ? 'active' : ''}}"><a href="{{route('admin.slider')}}"><i class="fa fa-circle-o"></i> Slider </a></li>

          </ul>
        </li>

        <li class="treeview {{ Request::is('admin/boarding') || Request::is('admin/boarding/*') || Request::is('admin/airports') || Request::is('admin/airport/*') || Request::is('admin/airlines') || Request::is('admin/airline/*') || (request::is('admin/facility')) || (request::is('admin/facility/*'))  ? 'active' : ''}}">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <span class="label pull-right"><i class="fa fa-angle-right" style="font-size: 18px;"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::is('admin/boarding') || Request::is('admin/boarding/*') ? 'active' : '')}}"><a href="{{ route('admin.boarding') }}"><i class="fa fa-circle-o"></i>Boarding/Meal Plan </a></li>
            
            <li class="{{(Request::is('admin/airports') || Request::is('admin/airport/*') ? 'active' : '')}}"><a href="{{ route('admin.airports') }}"><i class="fa fa-circle-o"></i> Airport  </a></li>
            
            <li class="{{(Request::is('admin/airlines') || Request::is('admin/airline/*') ? 'active' : '')}}"><a href="{{ route('admin.airlines') }}"><i class="fa fa-circle-o"></i> Airlines </a></li>

            <li class="{{(Request::is('admin/rating_images') || Request::is('admin/rating_images/*') ? 'active' : '')}}"><a href="{{ route('admin.ratingImages') }}"><i class="fa fa-circle-o"></i> TA Rating Images </a></li>
            
            <li class="{{(request::is('admin/facility')) || (request::is('admin/facility/*')) ? 'active' : ''}}"><a href="{{route('admin.facility')}}"><i class="fa fa-circle-o"></i> Hotel Facility </a></li>
            <li class="{{(request::is('admin/testimonials')) || (request::is('admin/testimonial/*')) ? 'active' : ''}}"><a href="{{url('admin/testimonials')}}"><i class="fa fa-circle-o"></i> Testimonials </a></li>
            <li class="{{(request::is('admin/suggestions')) || (request::is('admin/suggestion/*')) ? 'active' : ''}}"><a href="{{url('admin/suggestions')}}"><i class="fa fa-circle-o"></i> Suggestions </a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>