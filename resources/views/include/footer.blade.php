
        <!-- Modal HTML embedded directly into document -->
        <div id="testimonial" class="modal">
          <form class="js-validate" name="js-step-form" method="post" action="{{url('/testimonial/add')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="pt-2 pb-1 px-3">
                <div class="row">
                    <div class="col-sm-12 mb-3 mt-3">
                        <div class="js-form-message">
                            <div class="text-center">
                              <div class="profile_box">
                                  <div class="edit_pencile d-flex" style="position: relative;height: 117px;width: 116px;bottom: -3px;right: 0px;">
                                    <img id="img-thumbnail" src="{{ asset('img/photo.png') }}" style="max-height:100%;padding: 15px;">
                                    <input type="file" id="upload_profile1" name="upload_image" required="">
                                  </div>
                                    <label>Insert your image</label>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="js-form-message">
                            <input name="name" style="height:calc(1.2em + 1.2rem + 6px);" type="text" value="{{old('name') ?? ''}}" class="form-control alpha-only" minlength="2" placeholder="Name" aria-label="" required
                            data-msg="Please enter name."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="js-form-message">
                            <input name="profesion" style="height:calc(1.2em + 1.2rem + 6px);" type="email" value="{{old('profesion') ?? ''}}" class="form-control" minlength="2" placeholder="Email" aria-label="" required
                            data-msg="Please enter email."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-2">
                        <div class="js-form-message">
                            <textarea class="form-control" placeholder="Enter a short testimonial" name="text"
                             required=""
                            data-msg="Enter a short testimonial."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success"></textarea>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-12 align-self-end text-center">
                        <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-1 step-btn">Submit Testimonial</button>
                    </div>
                </div> 
            </div>
        </form>
        </div>
                <!-- Modal HTML embedded directly into document -->
        <div id="suggestions" class="modal">
          <form class="js-validate" name="js-step-form" method="post" action="{{url('/suggestion/add')}}">
            {{ csrf_field() }}
            <div class="pt-2 pb-1 px-3">
                <div class="row">
                    <div class="col-sm-12 mb-4 mt-3">
                        <div class="js-form-message">
                            <input name="name" type="text" value="{{old('name') ?? ''}}" class="form-control alpha-only" minlength="2" placeholder="Enter name" aria-label="" required
                            data-msg="Please enter name."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 mb-4">
                        <div class="js-form-message">
                            <textarea class="form-control" placeholder="Enter short description" name="text"
                             required=""
                            data-msg="Please enter short description."
                            data-error-class="u-has-error"
                            data-success-class="u-has-success"></textarea>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-12 align-self-end text-center">
                        <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-2 step-btn">Submit Suggestions</button>
                    </div>
                </div> 
            </div>
        </form>
        </div>


        <!-- ========== FOOTER ========== -->
        <footer class="footer mt-4">
            <div class="space-bottom-2 space-top-1">
                <div class="container">
                    <div class="row justify-content-xl-between">
                        <div class="col-12 col-md-3">
                            <!-- Contacts -->
                            <div class ="d-md-flex d-lg-block">
                                <div class="mb-5 mr-md-7 mr-lg-0">
                                    <h4 class="h6 mb-4 font-weight-bold">Need Some Help?</h4>
                                    <a href="tel:{{$contact->phone_number}}">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px">
                                                    <path fill-rule="evenodd"  class="fill-primary"
                                                     d="M36.093,16.717 L33.133,16.717 L30.864,19.693 C30.717,19.886 30.487,20.000 30.244,20.000 C30.244,20.000 30.243,20.000 30.243,20.000 C30.000,20.000 29.771,19.888 29.623,19.695 L27.335,16.717 L24.372,16.717 C22.218,16.717 20.465,14.965 20.465,12.811 L20.465,3.907 C20.465,1.753 22.218,0.001 24.372,0.001 L36.093,0.001 C38.247,0.001 40.000,1.753 40.000,3.907 L40.000,12.811 C40.000,14.965 38.247,16.717 36.093,16.717 ZM38.437,3.907 C38.437,2.615 37.386,1.563 36.093,1.563 L24.372,1.563 C23.080,1.563 22.028,2.615 22.028,3.907 L22.028,12.811 C22.028,14.103 23.080,15.155 24.372,15.155 L27.721,15.155 C27.964,15.155 28.193,15.268 28.340,15.460 L30.240,17.934 L32.124,15.462 C32.272,15.269 32.502,15.155 32.746,15.155 L36.093,15.155 C37.386,15.155 38.437,14.103 38.437,12.811 L38.437,12.811 L38.437,3.907 ZM31.014,8.429 L31.014,9.647 C31.014,10.078 30.664,10.428 30.232,10.428 C29.801,10.428 29.451,10.078 29.451,9.647 L29.451,8.239 C29.451,7.618 29.876,7.089 30.485,6.953 C31.041,6.829 31.416,6.323 31.376,5.752 C31.337,5.186 30.881,4.730 30.316,4.691 C29.992,4.669 29.685,4.777 29.451,4.996 C29.216,5.216 29.086,5.514 29.086,5.834 C29.086,6.266 28.736,6.616 28.305,6.616 C27.873,6.616 27.523,6.266 27.523,5.834 C27.523,5.087 27.837,4.365 28.384,3.854 C28.939,3.336 29.663,3.081 30.423,3.132 C31.763,3.225 32.843,4.304 32.935,5.644 C33.024,6.927 32.225,8.068 31.014,8.429 ZM30.233,11.646 C30.438,11.646 30.640,11.729 30.785,11.874 C30.930,12.020 31.014,12.221 31.014,12.427 C31.014,12.633 30.930,12.834 30.785,12.980 C30.640,13.125 30.438,13.209 30.233,13.209 C30.027,13.209 29.825,13.125 29.680,12.980 C29.535,12.834 29.451,12.633 29.451,12.427 C29.451,12.221 29.535,12.020 29.680,11.874 C29.825,11.729 30.027,11.646 30.233,11.646 ZM14.440,16.019 L23.973,25.550 L24.760,24.764 C24.760,24.764 24.760,24.764 24.760,24.764 C24.760,24.764 24.761,24.763 24.761,24.763 L26.731,22.794 C27.574,21.951 28.695,21.487 29.887,21.487 C31.079,21.487 32.200,21.951 33.043,22.794 L38.693,28.442 C39.536,29.285 40.000,30.406 40.000,31.598 C40.000,32.790 39.536,33.910 38.693,34.753 L37.204,36.242 C34.780,38.665 31.557,40.000 28.129,40.000 C24.701,40.000 21.478,38.665 19.054,36.242 L13.486,30.676 C13.181,30.370 13.181,29.875 13.486,29.570 C13.792,29.265 14.286,29.265 14.592,29.570 L20.159,35.137 C22.288,37.265 25.118,38.438 28.129,38.438 C30.646,38.438 33.038,37.617 34.998,36.104 L25.313,26.421 L24.526,27.208 C24.221,27.513 23.726,27.513 23.421,27.208 L12.782,16.572 C12.636,16.425 12.553,16.227 12.553,16.019 C12.553,15.812 12.636,15.614 12.782,15.467 L16.092,12.158 C17.223,11.027 17.223,9.187 16.092,8.056 L10.448,2.413 C9.317,1.282 7.476,1.282 6.345,2.413 L4.928,3.830 L10.929,9.830 C11.234,10.135 11.234,10.630 10.929,10.935 C10.776,11.087 10.576,11.163 10.376,11.163 C10.176,11.163 9.976,11.087 9.824,10.935 L3.890,5.002 C0.490,9.418 0.812,15.794 4.856,19.837 L10.346,25.326 C10.651,25.631 10.651,26.126 10.346,26.431 C10.041,26.736 9.546,26.736 9.241,26.431 L3.751,20.943 C-1.253,15.940 -1.253,7.800 3.751,2.797 L5.240,1.308 C6.981,-0.432 9.813,-0.432 11.553,1.308 L17.197,6.951 C18.938,8.691 18.938,11.522 17.197,13.263 L14.440,16.019 ZM36.170,35.066 L37.588,33.648 C38.135,33.101 38.437,32.372 38.437,31.598 C38.437,30.823 38.135,30.094 37.587,29.547 L31.938,23.899 C31.390,23.351 30.662,23.049 29.887,23.049 C29.112,23.049 28.384,23.351 27.836,23.899 L26.418,25.316 L36.170,35.066 ZM11.492,12.280 C11.492,12.074 11.576,11.873 11.721,11.727 C11.866,11.581 12.068,11.498 12.274,11.498 C12.479,11.498 12.681,11.581 12.826,11.727 C12.971,11.873 13.055,12.074 13.055,12.280 C13.055,12.485 12.971,12.687 12.826,12.832 C12.681,12.977 12.479,13.061 12.274,13.061 C12.068,13.061 11.866,12.977 11.721,12.832 C11.576,12.687 11.492,12.485 11.492,12.280 ZM12.046,27.349 C12.252,27.349 12.453,27.433 12.599,27.578 C12.744,27.724 12.828,27.925 12.828,28.130 C12.828,28.336 12.744,28.538 12.599,28.683 C12.453,28.828 12.252,28.912 12.046,28.912 C11.841,28.912 11.639,28.828 11.494,28.683 C11.348,28.538 11.265,28.336 11.265,28.130 C11.265,27.925 11.348,27.724 11.494,27.578 C11.639,27.433 11.841,27.349 12.046,27.349 Z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="mb-2 h6 font-weight-normal text-gray-1">Got Questions ? Call us <br>9am - 8pm ( Mon-Fri )<br>10am - 6pm ( Sat-Sun )</div>
                                                <small class="d-block font-size-18 font-weight-normal text-primary">Call Us: <span class="text-primary font-weight-semi-bold">{{$contact->phone_number}}</span></small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                            <!-- End Contacts -->
                        </div>
                        <div class="col-12 col-md-2">
                            <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Company</h4>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0">
                                <li><a class="text-decoration-on-hover list-group-item list-group-item-action" href="{{route('front.about_us')}}">About us</a></li>
                                <li><a class="list-group-item list-group-item-action text-decoration-on-hover" href="{{route('front.privacy')}}">Privacy Statement</a></li>
                                <li><a class="list-group-item list-group-item-action text-decoration-on-hover" href="{{route('front.terms')}}">Terms & Conditions</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md-2">
                            <h4 class="h6 font-weight-bold mb-2 mb-xl-4">We are listening</h4>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0">
                                <li><a class="list-group-item list-group-item-action text-decoration-on-hover" href="#testimonial" rel="modal:open">Testimonials</a></li>
                                <li><a class="list-group-item list-group-item-action text-decoration-on-hover" href="#suggestions" rel="modal:open">Suggestions</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md-2">
                            <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Support</h4>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0">
                                <li>
                                    <a class="list-group-item list-group-item-action text-decoration-on-hover" href="{{url('query-form')}}">Get a Quote</a>
                                </li>
                                <li>
                                    <a class="list-group-item list-group-item-action text-decoration-on-hover" href="{{url('contact-us')}}">Contact Us</a>
                                </li>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md-3">
                            <h4 class="h6 font-weight-bold mb-2 font-size-17">Contact Info</h4>
                            <address class="pr-4">
                                <span class="mb-2 h6 font-weight-normal text-gray-1">
                                    {!! $contact->location !!}
                                </span>
                            </address>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-2">
                                    <a class="btn btn-icon btn-social btn-bg-transparent" href="{{$follow->facebook}}">
                                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-2">
                                    <a class="btn btn-icon btn-social btn-bg-transparent" href="{{$follow->tweet}}">
                                        <span class="fab fa-twitter  btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-2">
                                    <a class="btn btn-icon btn-social btn-bg-transparent" href="{{$follow->instagram}}">
                                        <span class="fab fa-instagram btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-2">
                                    <a class="btn btn-icon btn-social btn-bg-transparent" href="{{$follow->pinterest}}">
                                        <span class="fab fa-linkedin-in btn-icon__inner"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="border-top border-bottom border-color-8 ">
                <div class="container">
                    <div class="row d-block d-xl-flex align-items-md-center">
                        <div class="col-xl-4 mb-4 mb-xl-0">
                        <!-- Logo -->
                            <a class="d-inline-flex align-items-center" href="#" aria-label="MyTravel">
                                @include('include.logo')
                            </a>
                        <!-- End Logo -->
                        </div>
                        <div class="bootstrap-select__custom col-xl-8 d-block d-lg-flex justify-content-xl-end align-items-center">
                            <div class="mb-4 mb-lg-0">
                                <ul class="d-flex list-unstyled mb-0">
                                    <li class="mr-2 ml-0"><img class="max-width-40" src="{{asset('front_component/img/icons/img3.png')}}" alt="Payment Icons"></li>
                                    <li class="mx-2"><img class="max-width-40" src="{{asset('front_component/img/icons/img4.png')}}" alt="Payment Icons"></li>
                                    <li class="mx-2"><img class="max-width-40" src="{{asset('front_component/img/icons/img5.png')}}" alt="Payment Icons"></li>
                                    <li class="mx-2"><img class="max-width-40" src="{{asset('front_component/img/icons/img6.png')}}" alt="Payment Icons"></li>
                                    <li class="ml-2 mr--0"><img class="max-width-40" src="{{asset('front_component/img/icons/img7.png')}}" alt="Payment Icons"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-block text-gray-1">
                            For the latest travel advice from the Foreign & Commonwealth Office including security and local laws, plus passport and visa information, check <a href="https://www.gov.uk/foreign-travel-advice">www.gov.uk/foreign-travel-advice</a>.
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-1">
                <div class="container">
                    <div class="d-lg-flex d-md-block justify-content-between align-items-center">
                        <!-- Copyright -->
                        <p class="mb-3 mb-lg-0 text-gray-1">© {{date('Y')}} Florida Calling. All rights reserved</p>
                        <!-- End Copyright -->
                    </div>
                </div>
            </div>
            {{-- <div class="copyright-section">
                <div class="content-middle">
                    <div class="terms-of-conditions txt-left"> 
                        <span class="short-desc">
                            <h4 class="txt-bold">TRAVEL AWARE – STAYING SAFE AND HEALTHY ABROAD</h4>
                            <p>The Foreign, Commonwealth &amp; Development Office and National Travel Health Network and Centre have up-to-date advice on staying safe and healthy abroad.</p>
                            <p>For the latest travel advice from the Foreign, Commonwealth &amp; Development Office along with security and local laws, passport and visa information click 
                                <a href="https://www.gov.uk/travelaware" target="_blank">www.gov.uk/travelaware</a> and 
                                <br class="show-on-mobile">
                                <br class="show-on-mobile">follow
                                <br class="show-on-mobile">
                                <br class="show-on-mobile">and 
                                <a href="https://www.gov.uk/foreign-travel-advice" target="_blank">https://www.gov.uk/foreign-travel-advice</a> 
                                <br class="show-on-mobile">
                                <br class="show-on-mobile"> and 
                                <a href="https://www.facebook.com/" target="_blank">Facebook.com/</a>
                            </p>
                            <p>For more information please see 
                                <a href="/help">www.teletextholidays.co.uk/help</a>
                            </p>
                            <p>Keep up to date with current travel health news by visiting 
                                <a href="https://www.travelhealthpro.org.uk/" target="_blank"> www.travelhealthpro.org.uk</a>
                            </p>
                            <p>Please note the advice can change so check regularly for updates.</p> 
                        </span>
                        <div class="hidden-content full-desc">
                            <div class="travel-aware">
                                <h4 class="fw-600">TRAVEL AWARE – STAYING SAFE AND HEALTHY ABROAD</h4>
                                <p>The Foreign, Commonwealth &amp; Development Office and National Travel Health Network and Centre have up-to-date advice on staying safe and healthy abroad.</p>
                                <p>For the latest travel advice from the Foreign, Commonwealth &amp; Development Office along with security and local laws, passport and visa information click 
                                    <a href="https://www.gov.uk/travelaware" target="_blank">www.gov.uk/travelaware</a> and follow @FCDOtravelGovUK and 
                                    <a href="https://www.gov.uk/foreign-travel-advice" target="_blank">https://www.gov.uk/foreign-travel-advice</a> and 
                                    <a href="https://www.facebook.com/FCDOTravel" target="_blank">Facebook.com/FCDOTravel</a></p>
                                    <p>For more information please see <a href="/help">www.teletextholidays.co.uk/help</a></p>
                                    <p>Keep up to date with current travel health news by visiting <a href="https://www.travelhealthpro.org.uk/" target="_blank"> www.travelhealthpro.org.uk</a>
                                    </p>
                                    <p>Please note the advice can change so check regularly for updates.</p>
                            </div>
                            <p>Bookings are arranged by Truly Travel Ltd (a member of the TTA (U6466)), under the trading name Teletext Holidays unless otherwise stated. Products and prices are subject to availability and Truly Travel Ltd’s and the applicable supplier(s) terms &amp; conditions, and you must read these carefully before making any booking. Each travel service is priced separately and independently, creating direct and separate contracts between you and the applicable supplier/principal(s). We are not a party to any such contract. However, where you book a “Multi-Contract Package” as defined in our Terms &amp; Conditions, we shall accept responsibility for your booking as the “organiser” under the Package Travel &amp; Linked Travel Arrangements Regulations 2018. This does not affect our agency status. Please see our booking conditions for further information https://www.teletextholidays.co.uk/terms-and-conditions. All ratings shown on this website are those of the supplier/principal and may not be the official classification. We cannot guarantee the accuracy of any ratings given. Many of the flights and flight-inclusive holidays on this website are financially protected by the ATOL scheme (T7300). But ATOL protection does not apply to all holiday and travel services listed on this website. Please ask us to confirm what protection may apply to your booking. If you do not receive an ATOL Certificate then the booking will not be ATOL protected. If you do receive an ATOL Certificate but all the parts of your trip are not listed on it, those parts will not be ATOL protected. Please see our booking conditions for information, or for more information about financial protection and the ATOL Certificate go to: www.atol.org.uk/ATOLcertificate. Our low deposit scheme applies for new flight and hotel bookings valid on bookings up until 31st October 2021 (Note low deposits do not apply within 4 months of departure) and subject to availability. Deposits vary by destination, supplier/airline and route and start from £25pp on holidays to European destinations. Deposits to other destinations may be higher. All prices shown are from prices and accurate at the time they were posted on the website, but we act as an agent and do not control ever changing prices; therefore the current live price is obtainable by telephoning our call centre. Teletext Holidays reserves the right to withdraw offers at any time.
                            </p>
                        </div> 
                        <span class="txt-more trigger-readmore show-on-mobile">Read more</span>
                    </div> 
                    <span class="float-left copyright">© {{date('Y')}} Florida Calling.</span>
                    <div class="clear"></div>
                </div>
            </div> --}}
        </footer>
        <!-- ========== End FOOTER ========== -->
        @push('custom-scripts')
        <script type="text/javascript">
            
        $(document).on('change',"#upload_profile1", function () {
          var tempId = "#img-thumbnail";
          var defaultImg = base_url+"/public/images/photo.png";
          var fileId = "#upload_profile1";
          selectProfileDocImage(this,defaultImg,fileId,tempId);
        });

        function selectProfileDocImage(input,defaultImg,fileId,tempId){
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              var filename = input.files[0].name;
              var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
              var fileExtensionCase = fileExtension.toLowerCase();
              if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
                reader.onload = function (e) {
                    jQuery(tempId).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);        
              }
              else if (fileExtensionCase == 'pdf' || fileExtensionCase == 'doc' || fileExtensionCase == 'txt' || fileExtensionCase == 'docx') {
                jQuery(tempId).attr('src',defaultImg);
              }
              else{
                toastr.error("Not a valid Extension!");
                $(fileId).val('');
                $(tempId).attr('src', defaultImg);
              }
          }
        }
        
        </script>
        @endpush