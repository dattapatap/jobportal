<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="Job board Admin template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="bootstrap job board template, bootstrap job template" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts/font-awesome.min.css') }}">
    <link href="{{ asset('assets/plugins/toggle-sidebar/sidemenu.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Dashboard Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin-custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fileuploads/css/dropify.css')}}" rel="stylesheet" />
    <!--Select2 Plugin -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- Datatable -->
    <link href="{{ asset('css/datatable.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/datatable.responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/toastr.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet" /> --}}

    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-switch/bootstrap.switch.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-switch/bootstrap.switch.min.css')}}" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" rel="stylesheet" />

    <!---Font icons-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <!-- Color-Skins -->
    <link id="theme" rel="stylesheet" media="all" href="{{ asset('assets/color-skins/color-skins/color10.css') }}" />
    @yield('style')
</head>
<body class="app sidebar-mini">
    <!--Loader-->
    <!-- <div id="global-loader">
			<img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="">
		</div> -->
    <div class="page">
        <div class="page-main">
            <div class="app-header1 header py-1 d-flex">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a class="header-brand" href="{{ url('admin/dashboard') }}">
                            LOGO
                            <!-- <img src="{{ asset('assets/images/brand/logo2.png') }}" class="header-brand-img" alt="Jobslist logo"> -->
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
                                            <a href="{{ url('admin/notifications') }}" class="dropdown-item d-flex pb-3" data-id="{{ $item->id }}" style="background-color:#164bce26">
                                                <div class="notifyimg">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                                <div>
                                                    <strong>{{ $item->data['data']}}</strong>
                                                    <div class="small text-muted"> {{ $item->created_at }}  </div>
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ url('admin/notifications') }}" class="dropdown-item d-flex pb-3">
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
                                    <a  href="{{ url('admin/notifications') }}" class="dropdown-item text-center">See all Notification</a>
                                </div>
                            </div>


                            <div class="dropdown ">
                                <a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                                    @if(Auth::user()->avatar)
                                        <img  src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}" alt="profile-img" class="avatar avatar-md brround" alt="img">
                                    @else
                                        <img  src="{{ Avatar::create( Auth::user()->name )->toBase64();  }}" alt="profile-img" class="avatar avatar-md brround" alt="img">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                        <i class="dropdown-icon icon icon-user"></i> My Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ url('admin/changepassword')}}">
                                        <i class="dropdown-icon  icon icon-settings"></i> Change Password
                                    </a>

                                    <a class="dropdown-item" href="{{ url('admin/package/settings')}}">
                                        <i class="dropdown-icon  icon icon-settings"></i> Points Setting
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
                            <img  src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}" alt="user-img" class="avatar avatar-lg brround">
                        @else
                            <img  src="{{ Avatar::create( Auth::user()->name )->toBase64();  }}" alt="user-img" class="avatar avatar-lg brround">
                        @endif

                        </div>
                        <div class="user-info">
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                </div>
                <ul class="side-menu">
                    <li class="active">
                        <a class="side-menu__item" href="{{ url('admin/dashboard') }}"><i
                                class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">
                                Dashboard</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{ route('admin.recruiter')}}"><i class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Recruiters</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{ route('admin.employee')}}"><i class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Employees</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{ url('admin/postedjobs')}}"><i class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Jobs</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon fa fa-tachometer"></i>
                            <span class="side-menu__label">Assessment</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{url('admin/skills')}}" class="slide-item">Q Category/Skills</a>
                            </li>
                            <li>
                                <a href="{{url('admin/questions')}}" class="slide-item">Questions</a>
                            </li>
                            <li>
                                <a href="{{url('admin/testslots')}}" class="slide-item">Test Slots</a>
                            </li>
                             {{--<li>
                                <a href="{{url('admin/qpcategory')}}" class="slide-item">QP Category</a>
                            </li>
                            <li>
                                <a href="{{url('admin/qp')}}" class="slide-item">Question Paper</a>
                            </li> --}}

                        </ul>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{ url('admin/payments')}}"><i class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Transactions</span></a>
                    </li>

                    <li>
                        <a class="side-menu__item" href="{{ url('admin/blogs')}}"><i class="side-menu__icon fa fa-user"></i><span
                                class="side-menu__label">Blogs</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon fa fa-tachometer"></i>
                            <span class="side-menu__label">Educations</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{ url('admin/courses')}}" class="slide-item">Courses</a>
                            </li>
                            <li><a href="{{ url('admin/course/specifications')}}" class="slide-item">Specifications</a></a></li>
                        </ul>
                    </li>



                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon fa fa-tachometer"></i>
                            <span class="side-menu__label">Others</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{ url('admin/packages')}}" class="slide-item">Packages</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/country')}}" class="slide-item">Country</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/states')}}" class="slide-item">State</a>
                            </li>
                            <li><a href="{{ url('admin/cities')}}" class="slide-item">City</a></li>
                            <li>
                                <a href="{{ url('admin/industries')}}" class="slide-item">Industry</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/jobpositions')}}" class="slide-item">Job Positions</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/audit')}}" class="slide-item">Audits</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/organisation')}}" class="slide-item">Organisations</a>
                            </li>
                        </ul>
                    </li>


                </ul>

            </aside>


            <!-- Applications Content Body -->
            @yield('content')

            <!-- End Main Content -->
        </div>
        <!--footer-->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                        Copyright © 2021 <a href="#">||</a>. Designed & Developed by <a href="#">DigitalNock It
                            Solutions</a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer-->
    </div>

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>

    <!-- Dashboard Core -->
    <script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"> </script>
    <script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/selectize.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.tablesorter.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- Fullside-menu Js-->
    <script src="{{ asset('assets/plugins/toggle-sidebar/sidemenu.js') }}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.sampledata.js') }}"></script>

    <script src="{{ asset('js/datatable.min.js') }}"></script>
    <script src="{{ asset('js/datatable.responsive.min.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <!--Counters -->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/numeric-counter.js') }}"></script>
    <!-- Custom scroll bar Js-->
    <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin-custom.js') }}"></script>
    <script src="{{ asset('assets/js/index3.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

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
