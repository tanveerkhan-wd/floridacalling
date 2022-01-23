<!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header--abs-top-xl u-header--white-nav-links-xl u-header--bg-transparent-xl u-header--show-hide-xl" data-header-fix-moment="500" data-header-fix-effect="slide">
            <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
                <!-- Topbar -->
                <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-white">
                    <div class="d-flex align-items-center">
                        <ul class="list-inline u-header__topbar-nav-divider mb-0">
                            <li class="list-inline-item mr-0"><a href="tel:{{$contact->phone_number}}" class="u-header__navbar-link font-size-17"><strong>{{$contact->phone_number}}</strong></a></li>
                            <li class="list-inline-item mr-0"><a href="mailto:{{$contact->email}}" class="u-header__navbar-link font-size-17"><strong>{{$contact->email}}</strong></a></li>
                        </ul>
                        <div class="ml-auto d-flex align-items-center">
                            <ul class="list-inline mb-0 mr-2 pr-1">
                                <li class="list-inline-item text-center text-white">
                                    <span class="position-relative" style="top:10px;">Monday-Friday: 9am - 8pm</span><br>
                                    <span class="position-relative" style="top:10px;">Saturday-Sunday: 10am - 6pm</span>
                                </li>
                                @if(!Request::is('query-form'))
                                <li class="list-inline-item">
                                    <a class="btn btn-sm btn-pill btn-soft-white btn-bg-transparent transition-3d-hover font-size-17" href="{{url('query-form')}}">
                                        Get a Quote
                                    </a>
                                </li>
                                @endif
                                <li class="list-inline-item">
                                    <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{$follow->facebook}}" target="_blank">
                                        <span class="fab fa-facebook-f btn-icon__inner" style="font-size: 20px;"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{$follow->tweet}}" target="_blank">
                                        <span class="fab fa-twitter btn-icon__inner" style="font-size: 20px;"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{$follow->instagram}}" target="_blank">
                                        <span class="fab fa-instagram btn-icon__inner" style="font-size: 20px;"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-sm btn-icon btn-pill btn-soft-white btn-bg-transparent transition-3d-hover" href="{{$follow->pinterest}}" target="_blank">
                                        <span class="fab fa-linkedin-in btn-icon__inner" style="font-size: 20px;"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->
                <div id="logoAndNav" class="container-fluid py-xl-2">
                    <!-- Nav -->
                    <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                        <!-- Logo -->
                        <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-white" href="{{url('/')}}" aria-label="MyTravel">
                            @include('include.logo')
                        </a>
                        <!-- End Logo -->

                        <!-- Handheld Logo -->
                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-collapsed" href="{{url('/')}}" aria-label="MyTravel">
                            @include('include.logo')
                        </a>
                        <!-- End Handheld Logo -->

                        <!-- Scroll Logo -->
                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-on-scroll" href="{{url('/')}}" aria-label="MyTravel">
                            @include('include.logo')
                        </a>
                        <!-- End Scroll Logo -->

                        <!-- Responsive Toggle Button -->
                        <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                            <span id="hamburgerTrigger" class="u-hamburger__box">
                                <span class="u-hamburger__inner"></span>
                            </span>
                        </button>
                        <!-- End Responsive Toggle Button -->

                        <!-- Navigation -->
                        <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                            <ul class="navbar-nav u-header__navbar-nav">
                               @include('include.nav-bar')
                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </header>
        <!-- ========== END HEADER ==========