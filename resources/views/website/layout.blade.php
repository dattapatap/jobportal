<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Title -->
    <title>IndiaPharma Job</title>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}"
        rel="stylesheet" />
    <!-- Dashboard Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- Font-awesome  Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <!--Horizontal Menu-->
    <link
        href="{{ asset('assets/plugins/horizontal/horizontal-menu/animation/fade-down.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/horizontal/horizontal-menu/horizontal.css') }}"
        rel="stylesheet" />
    <!-- Drofify -->
    <link href="{{ asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" />
    <!--Select2 Plugin -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- Cookie css -->
    <link href="{{ asset('assets/plugins/cookie/cookie.css') }}" rel="stylesheet">
    <!-- Owl Theme css-->
    <link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- video css-->
    <link href="{{ asset('assets/plugins/video/insideElementDemo.css') }}" rel="stylesheet" />
    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/color-skins/color-skins/color10.css') }}" rel="stylesheet" />
    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/color-skins/color-skins/color10.css') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Goldman&family=Montserrat:wght@400;600&family=PT+Sans&display=swap"
        rel="stylesheet">
</head>

<body class="main-body">
    <!-- Loader -->
     <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="">
    </div>

    <!-- Popup Intro-->

    <!-- <div id="myModal" class="modal fade">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-bottom-0">
						<a class="close btn  btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">
							Skip
						</a>
					</div>
					<div class="modal-body">
						<div id="popupcarousel" class="owl-carousel testimonial-owl-carousel4">
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia text-center">
											<img src="{{ asset('PNG_1.png') }}" class="w-70 h-100 mb-5 mx-auto text-center" alt="image">
											<h3>Register With Us</h3>
											<p style="font-size:16px;">
											<span style="font-size:18px;color:red;">Are you Looking for a Job? </span><br> Take a Test and get
											registered. Start applying for thousands of Job Interviews & Recruitment drives</p>
											<a href="{{url('register')}}" class="btn btn-primary  mb-3">Register</a>
										</div>
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia text-center">
											<img src="{{ asset('PNG_2.png') }}" class="w-70 mb-5 mx-auto text-center" alt="image">
											<h3>Join With Us</h3>
											<p style="font-size:16px;">
											<span style="font-size:18px;color:red;">Are You Looking For a Candidate ?</span> <br>Now, search candidates online with ease. Connect with largest pool of right candidates in lesser time.</p>
											<a href="{{ url('recregister')}}" class="btn btn-primary  mb-3">Join</a>
										</div>
									</div>
								</div>
							</div>
							<div class="item text-center">
								<div class="row">
									<div class="col-xl-8 col-md-12 d-block mx-auto">
										<div class="testimonia text-center">
											<img src="{{ asset('PNG_3.png') }}" class="w-55 h-100 mb-5 mx-auto text-center" alt="image">
											<h3>Need Help</h3>
											<p>For any queries you can reach our customer care executives from Monday to Saturday between 10:00 am and 7:00 pm.</p>
											<a href="#" class="btn btn-primary  mb-3">Contact Us</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div> -->

    <!-- End Popup Intro-->

    <!--Header Main-->
    <div class="header-main">
        <!--Top Bar-->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-sm-4 col-7">
                        <div class="top-bar-left d-flex">
                            <div class="clearfix">
                                <ul class="socials">
                                    <li>
                                        <a class="social-icon" href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="social-icon" href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="social-icon" href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="social-icon" href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-sm-8 col-5">
                        <div class="top-bar-right">
                            <ul class="custom">
                                @guest
                                    @if(Route::has('login'))
                                        <li>
                                            <a href="{{ route('login') }}" class=""><i
                                                    class="fa fa-sign-in mr-1"></i>
                                                <span>{{ __('For Employee') }}</span></a>
                                        </li>
                                    @endif
                                    <!-- @if(Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}" class=""><i
                                                    class="fa fa-user mr-1"></i>
                                                <span>{{ __('Register') }}</span></a>
                                        </li>
                                    @endif -->
                                    @if(Route::has('rec-regisetr'))
                                        <li>
                                            <a href="{{ route('recr-login') }}" class=""><i
                                                    class="fa fa-black-tie mr-1"></i>
                                                <span>{{ __('For Employer') }}</span></a>
                                        </li>
                                    @endif
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="" data-toggle="dropdown"><i
                                                class="fa fa-home mr-1"></i><span> My Dashboard</span></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a href="#" class="dropdown-item">
                                                <i class="dropdown-icon icon icon-user"></i> My Profile
                                            </a>

                                            <a class="dropdown-item" href="#">
                                                <i class="dropdown-icon icon icon-bell"></i> Notifications
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <i class="dropdown-icon  icon icon-settings"></i> Account Settings
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="dropdown-icon icon icon-power"></i> Log out
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Top Bar-->
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><img src="{{ asset('logo.jpg') }}" alt="img" /></span>
                    <a href="{{url('index')}}" class="callusbtn bg-light"><i class="fa fa-bell text-body"
                            aria-hidden="true"></i></a></div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Mobile Header -->

    <!--Horizontal-main-->
    <div class="horizontal-main clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <div class="desktoplogo">
                <a href="{{url('index')}}"><img src="{{ asset('logo.jpg') }}" alt=""></a>
            </div>
            <div class="desktoplogo-1">
                <a href="{{url('index')}}"><img src="{{ asset('logo.jpg') }}" alt=""></a>
            </div>
            <!--Nav-->
            <nav class="horizontalMenu clearfix d-md-flex">
                <ul class="horizontalMenu-list">
                    <li><a href="{{url('index')}}">Home </a>

                    </li>
                    <li><a href="#">About Us </a></li>
                    <li><a href="{{url('jobs')}}">Jobs </a></li>

                    <li><a href="{{ url('recruiters')}}">Recruiter </a></li>

                    <li><a href="#">Testimonials </a></li>
                    <li><a href="#"> Contact Us <span class="horizontal-arrow"></span></a></li>
                    <li class="d-lg-none pt-5 pb-2 mt-lg-0">
                        <span><a class="btn btn-secondary ad-post mt-1" href="#"><i class="fa fa-briefcase"></i> Submit
                                a Job</a></span>
                    </li>
                    <li class="d-lg-none mt-0 pb-5 mt-lg-0">
                        <span><a class="btn btn-info ad-post mt-1" href="#"><i class="fa fa-edit"></i> Create
                                Resume</a></span>
                    </li>
                </ul>
                @guest
                    <ul class="mb-0 pr-2">
                        <li class="d-none d-lg-flex">
                            <span><a class="btn btn-secondary ad-post mt-1"
                                    href="{{ url('recregister') }}"><i
                                        class="fa fa-briefcase"></i> Submit
                                    a Job</a></span>
                        </li>
                    </ul>
                    <ul class="mb-0 pl-2 create-resume-btn">
                        <li class="d-none d-lg-flex">
                            <span><a class="btn btn-info ad-post mt-1"
                                    href="{{ url('login') }}"><i
                                        class="fa fa-edit"></i> Create
                                    Resume</a></span>
                        </li>
                    </ul>
                @else
                    @if(Auth::user()->role_id == 2)
                        <ul class="mb-0 pr-2">
                            <li class="d-none d-lg-flex">
                                <span><a class="btn btn-secondary ad-post mt-1"
                                        href="{{ url('recregister') }}"><i
                                            class="fa fa-briefcase"></i> Submit
                                        a Job</a></span>
                            </li>
                        </ul>
                    @endif
                    @if(Auth::user()->role_id == 3 )
                        <ul class="mb-0 pl-2 create-resume-btn">
                            <li class="d-none d-lg-flex">
                                <span><a class="btn btn-info ad-post mt-1"
                                        href="{{ route('employee.profile') }}"><i
                                            class="fa fa-edit"></i> Create
                                        Resume</a></span>
                            </li>
                        </ul>
                    @endif
                @endguest
            </nav>
            <!--/Nav-->
        </div>
    </div>
    <!--/Horizontal-main-->
    </div>
    <!--/Header Main-->


    @yield('content')


    <!--Footer Section-->
    <style>
        .main-footer {
            background-image: url("../../assets/images/world.jpg") !important;
        }

    </style>

    <section class="main-footer">
        <footer class=" text-white ">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <h6>Job Categories</h6>
                            <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#">Developement</a></li>
                                <li><a href="#">Designing</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Others</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <h6>Job Type</h6>
                            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#">Work from home</a></li>
                                <li><a href="#">Internship</a></li>
                                <li><a href="#">Part time</a></li>
                                <li><a href="#">Full time</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <h6>Resources</h6>
                            <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Contact Details</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <h6>Quick Links</h6>
                            <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#">About Us</a></li>


                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms Of Conditions</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <h6 class="mb-2">QR code</h6>
                            <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <div class="input-group w-100">
                                <img src="https://www.emoderationskills.com/wp-content/uploads/2010/08/QR1.jpg">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="text-white-50 border-top p-0">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-8 col-sm-12  mt-2 mb-2 text-left ">
                            Copyright © 2019 <a href="#" class="fs-14 text-white">Global Calcium</a>. Designed by <a
                                href="digitalnock.com" class="fs-14 text-white">DigitalNock</a> All rights reserved.
                        </div>
                        <div class="col-lg-4 col-sm-12 ml-auto mb-2 mt-2 d-none d-lg-block">
                            <ul class="social mb-0">
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-rss"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon" href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </section>
    <!--Footer Section-->

    <a href="#top" id="back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JQuery js-->
    <script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}">
    </script>

    <!--JQuery Sparkline Js-->
    <script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- Circle Progress Js-->
    <script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!--Owl Carousel js -->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!--Horizontal Menu-->
    <script src="{{ asset('assets/plugins/horizontal/horizontal-menu/horizontal.js') }}">
    </script>

    <!--JQuery TouchSwipe js-->
    <script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- Cookie js -->
    <!-- <script src="{{ asset('assets/plugins/cookie/jquery.ihavecookies.js') }}"></script>
    <script src="{{ asset('assets/plugins/cookie/cookie.js') }}"></script> -->

    <!-- Ion.RangeSlider -->
    <script src="{{ asset('assets/plugins/jquery-uislider/jquery-ui.js') }}"></script>

    <!-- sticky Js-->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Custom scroll bar Js-->
    <script
        src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>

    <!--Showmore Js-->
    <script src="{{ asset('assets/js/jquery.showmore.js') }}"></script>
    <script src="{{ asset('assets/js/showmore.js') }}"></script>


    <script src="{{ asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/dropfy-custom.js') }}"></script>


    <script src="{{ asset('assets/js/upload.js') }}"></script>
    <script src="{{ asset('assets/js/swipe.js') }}"></script>

    <!-- Scripts Js-->
    <script src="{{ asset('assets/js/scripts2.js') }}"></script>

    <!-- Custom Js-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @yield('scripts')

</body>

</html>
