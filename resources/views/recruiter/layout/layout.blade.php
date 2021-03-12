<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="Description" content="Job board Admin template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="bootstrap job board template, bootstrap job template"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />

		<!-- Title -->
	    <title>{{ config('app.name', 'Laravel') }}</title>

		<link rel="stylesheet" href="{{ asset('assets/fonts/fonts/font-awesome.min.css')}}">
		<!-- Sidemenu Css -->
		<link href="{{ asset('assets/plugins/toggle-sidebar/sidemenu.css')}}" rel="stylesheet" />
		<!-- Bootstrap Css -->
		<link href="{{ asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- Dashboard Css -->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/css/admin-custom.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/fileuploads/css/dropify.css')}}" rel="stylesheet" />
		<!-- Custom scroll bar css-->
		<link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
		<!---Font icons-->

		<link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet"/>
        <link href="{{ asset('js/toastr.min.css') }}" rel="stylesheet" />
        <!--Select2 Plugin -->
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
		<!-- Color-Skins -->
		<link id="theme" rel="stylesheet" href="{{ asset('assets/color-skins/color-skins/color10.css')}}" />
		<!-- WYSIWYG Editor css -->
		<link href="{{ asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
	</head>
	<body class="app sidebar-mini">
		<!--Loader-->
		<!-- <div id="global-loader">
			<img src="{{ asset('assets/images/loader.svg')}}" class="loader-img" alt="">
		</div> -->
		<div class="page">
			<div class="page-main">
				<div class="app-header1 header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="{{ url('recruiter/dashboard')}}">
							    LOGO
								<!-- <img src="{{ asset('assets/images/brand/logo2.png')}}" class="header-brand-img" alt="Jobslist logo"> -->
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="d-flex order-lg-2 ml-auto">
								<div class="dropdown d-none d-md-flex">
									<a class="nav-link icon" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        @if($unreadNotf)
                                            @if($unreadNotf > 9)
                                                <span class=" nav-unread badge badge-danger badge-pill" style="padding: 0.2rem 0.25rem;" > {{9}}+</span>
                                            @else
                                                <span class=" nav-unread badge badge-danger  badge-pill"> {{ $unreadNotf }}</span>
                                            @endif
                                        @endif
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item text-center">You have {{$unreadNotf}} notification</a>
										<div class="dropdown-divider"></div>

                                        @foreach ($notifications as $item)
                                            @if ( $item->read_at==null)
                                                <a href="{{ url('recruiter/notifications') }}" class="dropdown-item d-flex pb-3" data-id="{{ $item->id }}" style="background-color:#164bce26">
                                                    <div class="notifyimg">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                    <div>
                                                        <strong>{{ $item->data['data']}}</strong>
                                                        <div class="small text-muted"> {{ $item->created_at }}  </div>
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ url('recruiter/notifications') }}" class="dropdown-item d-flex pb-3">
                                                    <div class="notifyimg">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                    <div>
                                                        <strong>{{$item->data['data']}}</strong>
                                                        <div class="small text-muted"> {{ $item->created_at }}  </div>
                                                    </div>
                                                </a>
                                            @endif

                                        @endforeach
										<div class="dropdown-divider"></div>
										<a  href="{{ url('recruiter/notifications') }}" class="dropdown-item text-center">See all Notification</a>
									</div>
								</div>


								<div class="dropdown ">
									<a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
										@if(Auth::user()->avatar)
											<img  src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}" alt="profile-img" class="avatar avatar-md brround" alt="img">
										@else
											<img  src="{{ asset('assets/images/users/male/25.jpg')}}" alt="profile-img" class="avatar avatar-md brround" alt="img">
										@endif
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<a class="dropdown-item" href="{{ route('recruiter.profile') }}">
											<i class="dropdown-icon icon icon-user"></i> My Profile
										</a>
										<a class="dropdown-item" href="{{ url('recruiter/changepassword')}}">
											<i class="dropdown-icon  icon icon-settings"></i> Change Password
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
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								@if(Auth::user()->avatar)
									<img class="card-profile-img" src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}"  alt="user-img" class="avatar avatar-lg brround">
								@else
									<img  alt="user-img" class="avatar avatar-lg brround" src="{{ asset('assets/images/users/male/25.jpg')}}">
								@endif
							</div>
							<div class="user-info">
								<h2>{{  Auth::user()->name  }}</h2>
							</div>
						</div>
					</div>
					<ul class="side-menu">
						<li class="active">
							<a class="side-menu__item" href="{{ url('admin/dashboard')}}"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label"> Dashboard</span></a>
						</li>
						<li>
							<a class="side-menu__item" href="{{ url('recruiter/profile') }}"><i class="side-menu__icon fa fa-id-card"></i><span class="side-menu__label">Profile</span></a>
						</li>
						{{-- @if(Auth::user()->recruiter->status==1) --}}
							<li>
								<a class="side-menu__item" href="{{ url('recruiter/postedjobs') }}"><i class="side-menu__icon fa fa-briefcase"></i><span class="side-menu__label">Jobs List</span></a>
							</li>
							<li>
								<a class="side-menu__item" href="{{ url('recruiter/packages') }}"><i class="side-menu__icon fa fa-inr"></i><span class="side-menu__label">Packages</span></a>
							</li>
							<li>
								<a class="side-menu__item" href="{{ url('recruiter/viewdcandidate') }}"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Candidates</span></a>
							</li>
						{{-- @endif --}}
					</ul>
				</aside>

				<!-- Applications Content Body -->
				@yield('content');
			</div>
			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2021 <a href="#">||</a>. Designed & Developed by <a href="#">DigitalNock It Solutions</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>

		<!-- Dashboard Core -->
		<script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>
		<script src="{{ asset('assets/js/vendors/selectize.min.js')}}"></script>
		<script src="{{ asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{ asset('assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>
		<!--Counters -->
		<script src="{{ asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/counters/numeric-counter.js')}}"></script>
		<!-- Custom scroll bar Js-->
		<script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<script src="{{ asset('assets/js/admin-custom.js')}}"></script>
		<script src="{{ asset('assets/js/index3.js')}}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
		<!-- file uploads js -->
		<script src="{{ asset('js/select2.full.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/fileuploads/js/dropify.js')}}"></script>
		<script src="{{ asset('assets/plugins/fileuploads/js/dropfy-custom.js')}}"></script>


        @if(auth()->user())
            <script>
                $(document).ready(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                });
            </script>
        @endif
		@yield('scripts')
	</body>
</html>
