<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header--abs-top-xl u-header--white-nav-links-xl u-header--bg-transparent-xl u-header--show-hide-xl" data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
        <!-- Topbar -->
        <div class="bg-violet u-header__hide-content u-header__topbar u-header__topbar-lg py-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="text-white text-left font-size-20">
                            Call now to book - <b><a href="tel:{{ $contact->phone_number ?? '' }}" class="text-white">{{ $contact->phone_number ?? '' }}</a></b> | <a href="mailto:{{ $contact->email }}" class="text-white">{{ $contact->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-right text-white">
                            <span>Monday-Friday: 9am - 8pm</span><br>
                            <span>Saturday-Sunday: 10am - 6pm</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-right">
                            <a href="{{url('query-form')}}" class="btn btn-light text-violet btn-sm"><i class="fa fa-users"></i> Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div id="logoAndNav" class="container py-xl-3">
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
                
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>
<!-- ========== End HEADER ==========