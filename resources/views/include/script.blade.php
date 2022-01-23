<!-- JS Global Compulsory -->
<script src="{{asset('front_component/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('front_component/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{asset('front_component/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('front_component/vendor/bootstrap/bootstrap.min.js')}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset('front_component/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{asset('front_component/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('front_component/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('front_component/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front_component/vendor/slick-carousel/slick/slick.js')}}"></script>
<!-- Detail page -->
<script src="{{asset('front_component/vendor/gmaps/gmaps.min.js')}}"></script>
<script src="{{asset('front_component/vendor/player.js/dist/player.min.js')}}"></script>
<script src="{{asset('front_component/vendor/svg-injector/dist/svg-injector.min.js')}}"></script>
<script src="{{asset('front_component/vendor/appear.js')}}"></script>
<script src="{{asset('front_component/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('front_component/vendor/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!-- JS MyTravel -->
<script src="{{asset('front_component/js/hs.core.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.header.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.unfold.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.validation.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.show-animation.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.range-datepicker.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.range-slider.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.selectpicker.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.go-to.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.quantity-counter.js')}}"></script>
<!-- Detail page -->
<script src="{{asset('front_component/js/components/hs.g-map.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.video-player.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.svg-injector.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.scroll-nav.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.sticky-block.js')}}"></script>
<script src="{{asset('front_component/js/components/hs.fancybox.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script type="text/javascript" src="{{asset('js/cookie.notice.js')}}"></script>

<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
<script type="text/javascript">
    function showLoder() {
        $('#jsPreloader').fadeIn();
    }
    function hideLoder() {
        $('#jsPreloader').fadeOut();
    }
</script>
@stack('custom-scripts')
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 1199.98,
            hideTimeOut: 0
        });

        // Page preloader
        setTimeout(function() {
          $('#jsPreloader').fadeOut(500)
        }, 800);
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));
        // initialization of google map
        /*function initMap() {
            $.HSCore.components.HSGMap.init('.js-g-map');
        }*/

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of video player
        $.HSCore.components.HSVideoPlayer.init('.js-inline-video-player');
        
        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of datepicker
        $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

        // initialization of forms
        $.HSCore.components.HSRangeSlider.init('.js-range-slider');

        // initialization of select
        $.HSCore.components.HSSelectPicker.init('.js-select');

        // initialization of sticky blocks
        $.HSCore.components.HSStickyBlock.init('.js-sticky-block');

        // initialization of HSScrollNav component
        $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
            duration: 700
        });
        
        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate');
        
        // initialization of quantity counter
        $.HSCore.components.HSQantityCounter.init('.js-quantity');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });
</script>
{{-- <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBkNPF3xC_GPhYb64RitcbuwICqd19hRWc&callback=initMap" async defer></script> --}}
<script type="text/javascript">
    var base_url = '{{ url('/') }}';
</script>
