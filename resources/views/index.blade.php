@extends('website.layout')
@section('content')
    <!--Sliders Section-->
    <section>
        <div class="banner1  relative slider-images">
            <div class="container-fuild">
                <!-- Carousel -->
                <div class="owl-carousel testimonial-owl-carousel2 slider slider-header ">
                   <!--  <div class="item">
                        <img alt="first slide" src="{{ asset('assets/images/banners/a.jpg') }}">
                    </div> -->
                    <div class="item">
                        <img alt="first slide" src="{{ asset('assets/images/banners/b.jpg') }}">
                    </div>
                    <div class="item">
                        <img alt="first slide" src="{{ asset('assets/images/banners/c.jpg') }}">
                    </div>
                    <div class="item">
                        <img alt="first slide" src="{{ asset('assets/images/banners/d.jpg') }}">
                    </div>
                </div>
                <div class="header-text slide-header-text  pt-4 pb-4 my-auto">
                    <div class="col-xl-8 col-lg-8 col-md-8 d-block mx-auto">
                        <div class="input-field">
                            <div class="text-center text-white  mb-5 ">
                                <h1 class="mb-1">Find Your Desire Job</h1>
                                <p class="d-none d-md-block">A better career is out there We'll help you find it..</p>
                            </div>
                            <div class="search-background bg-transparent">
                                <form action="{{ url('jobs/search') }}" method="GET">
                                    <div class="form row no-gutters "
                                        style="background: rgb(197 195 195 / 58%);padding:15px;">
                                        <div class="form-group  col-xl-4 col-lg-3 col-md-12 mb-0 bg-white ">
                                            <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0"
                                                id="search_key" name="search_key" placeholder="Search Jobs" required>
                                        </div>
                                        <div class="form-group  col-xl-3 col-lg-3 col-md-12 select2-lg mb-0 bg-white">
                                            <select class="form-control select2-show-search" name="search_location" data-placeholder="Select Location" required>
                                                <optgroup label="Locations">
                                                    <option value="0">All City</option>
                                                    @foreach ($locations as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            <span><img src=" {{ asset('assets/images/svg/gps.svg') }}"
                                                    class="location-gps"></span>
                                        </div>
                                        <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                            <select class="form-control select2-show-search  border-bottom-0" name="search_category" data-placeholder="Select Category" required>
                                                <optgroup label="Positions">
                                                    <option value="0">All Categories</option>
                                                    @foreach ($inds as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                            <button type="submit" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0"><i
                                                    class="fa fa-search mr-1"></i>Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Sliders Section-->

    <style>
        .header-banner-box.register {
            background-position: left bottom;
            background: url(assets/images/register.jpg) no-repeat 0 0;
            background-size: auto 260px;
        }

        .header-banner-box.post-job {
            background-position: right bottom;
            background: url(assets/images/Resume.jpg) no-repeat 0 0;
            background-size: auto 260px;
        }

        .header-banner-box {
            position: relative;
            height: 260px;
            width: 100%;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            margin-top: 20px;
            background-repeat: no-repeat;
        }

        .header-banner-box.register .btn {
            position: absolute;
            bottom: 30px;
            right: 30px;
            display: block;
            padding: 5px 0;
            font-size: 18px;
            width: 186px;
            font-weight: bold;
        }

        .header-banner-box.post-job .btn {
            position: absolute;
            bottom: 30px;
            left: 30px;
            display: block;
            padding: 5px 0;
            font-size: 18px;
            width: 186px;
            font-weight: bold;
        }

    </style>

    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>Search Here For Better Job..</h1>
                <h3>Trusted & Popular Job Portal</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-banner-box register"
                        style="border: 7px solid #fff; box-shadow: 0px 0px 10px #e2e2e2;">
                        <a href="{{ url('/user-register') }}" class="btn btn-default btn-primary"><i
                                class="fa fa-user-plus" aria-hidden="true"></i>
                            Register with us</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header-banner-box post-job"
                        style="border: 7px solid #fff;box-shadow: 0px 0px 10px #e2e2e2;">
                        <!--	<img src="img/verified.png" alt="">-->
                        <a href="{{ url('/upload-web-resume') }}" class="btn btn-gray btn-primary"><i
                                class="fa fa-cloud-upload" aria-hidden="true"></i>
                            Upload Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Featured Jobs-->
    <section class="sptb bg-dark"
        style=" background: url({{ asset('assets/images/banners/2.jpg') }});background-attachment: fixed;">
        <div class="container" id="containe">
            <div class="section-title center-block text-center">
                <h1 style="color:white;">Latest Jobs</h1>
                <h4 style="color:white;">A better career is out there. We'll help you find it. We're your first step to
                    becoming everything you want to be.</h4>
            </div>
            <div class="row">
                @isset($jobs)
                    @foreach ($jobs as $job)
                        <div class="col-xl-4 col-md-6">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="item-card7-desc">
                                        <div class="item-card7-text">
                                            <a href="{{ url('job/search/'. $job->id .'/details') }}" class="text-dark">
                                                <h4 class="font-weight-semibold">{{ $job->job_title}} </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <a class="icons font-weight-semibold text-body"><i
                                            class="fa fa-inr  text-muted mr-1"></i>{{ $job->min_salary.' - '.$job->max_salary }}</a>
                                    <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i> Exp -{{ $job->min_exp.' To '.$job->max_exp }} yrs</a>
                                </div>
                                <div class="card-body py-2">
                                    <div class="d-flex align-items-center mt-auto">
                                        <div>
                                            <a  class="text-default fs-13">{{ $job->location->name  }}</a>
                                            <small class="d-block text-muted">{{ $job->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="ml-auto text-muted">
                                            <a class="text-default fs-13"> Openings - {{ $job->job_tot_positions }}</a>
                                            <small class="d-block text-muted">{{ $job->job_eligibility }}</small>
                                        </div>
                                    </div>
                                     <div class="ml-auto text-muted pull-right mt-2">
                                         <a href="{{ url('job/search/'. $job->id .'/details') }}" class="btn btn-sm btn-secondary text-white">See Details</a>
                                     </div>
                                </div>

                           </div>
                        </div>
                    @endforeach
                @endisset

            </div>
            <div class="text-center">
                <a href="{{ url('jobs') }}" class="btn  btn-primary "> View More</a>
            </div>
        </div>
    </section>
    <!--/Featured Jobs-->

    <!--Blogs-->
    <section class="sptb cover-image sptb-tab " style="background:white;">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>Latest News</h1>
            </div>
            <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
                @if (isset($blogs))
                    @foreach ($blogs as $item)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="item7-card-img">
                                <a href="{{ url('blog/'. $item->id .'/details') }}"></a>
                                <img src="{{ asset('storage/images/blogs/'. $item->image) }}" alt="img" class="cover-image">
                            </div>
                            <div class="card-body p-4">
                                <div class="item7-card-desc d-flex mb-2">
                                    <a href="javascript:void(0);"><i class="fa fa-calendar-o text-muted mr-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('M-d-Y')}}</a>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0);"><i class="fa fa-comment-o text-muted mr-2"></i>4 Comments</a>
                                    </div>
                                </div>
                                <a href="{{ url('blog/'. $item->id .'/details') }}" class="text-dark">
                                    <h4 class="font-weight-semibold">@if(strlen($item->header) > 35) {{ substr($item->header, 0, 35) }}...@else {{substr($item->header, 0, 35) }} @endif </h4>
                                </a>
                                <p>{!! substr($item->content, 0, 140) !!} </p>
                                <div class="d-flex align-items-center pt-2 mt-auto float-right">
                                    <a href="{{ url('blog/'. $item->id .'/details') }}" class="btn btn-info btn-sm float-right">Read More</a>
                                    {{-- <img src="" class="avatar brround avatar-md mr-3" alt="avatar-img">
                                    <div>
                                        <a href="javascript:void(0);" class="text-default">{{ $item->user->name }}</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--Blogs-->
    <section class="sptb bg-white"
        style=" background: url({{ asset('assets/images/banners/1.jpg') }});background-attachment: fixed;">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:black">How It Works?</h2>
                <h3 style="color:black">Say hello to your dream job with IFJ</h3>
            </div>
            <!--Product Info Tabs-->
            <div class="product-info-tabs">

                <!--Product Tabs-->
                <div class="prod-tabs" id="product-tabs">

                    <!--Tab Btns-->
                    <div class="tab-btns">

                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="row">

                                    <div class="col-md-4 col-sm-4">
                                        <a id="first" class="tab-btn" style="cursor:pointer;">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon line300 animated delay5"
                                                    data-animation="bounceIn"> <i class=" effect-1"><img
                                                            src="{{ asset('assets/images/ic1.png') }}"
                                                            style="hvoer:red;"></i> </div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Create an Account</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>
                                    <!-- end .col-md-3 col-sm-3 -->

                                    <div class="col-md-4 col-sm-4">
                                        <a id="two" class="tab-btn">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon line300 animated delay10"
                                                    data-animation="bounceIn"> <i class=" effect-1"><img
                                                            src="{{ asset('assets/images/ic2.png') }}"
                                                            style="hvoer:red;"></i> </div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Take a Test</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>
                                    <!-- end .col-md-3 col-sm-3 -->

                                    <div class="col-md-4 col-sm-4">
                                        <a id="three" class="tab-btn">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon line300 animated delay15"
                                                    data-animation="bounceIn"> <i class=" effect-1"><img
                                                            src="{{ asset('assets/images/ic3.png') }}"
                                                            style="hvoer:red;"></i> </div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Get Score</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>
                                    <!-- end .col-md-3 col-sm-3 -->


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">

                                    <div class="col-md-4 col-sm-4 leftmargin">
                                        <a id="five" class="tab-btn">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon  line300 animated delay15"
                                                    data-animation="bounceIn"> <i class=" effect-1"><img
                                                            src="{{ asset('assets/images/ic4.png') }}"
                                                            style="hvoer:red;"></i></div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Search Jobs</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <a id="six">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon line300 animated delay15"
                                                    data-animation="bounceIn"> <i class=" effect-1"><img
                                                            src="{{ asset('assets/images/ic5.png') }}"
                                                            style="hvoer:red;"></i> </div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Save and Apply</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <a id="seven">
                                            <div class="iconbox1">
                                                <div class="iconbox1-icon  animated delay15" data-animation="bounceIn"> <i
                                                        class=" effect-1"><img src="{{ asset('assets/images/ic6.png') }}"
                                                            style="hvoer:red;"></i></div>
                                                <!-- end .iconbox1-icon -->
                                                <h5 style="color:black;">Get Hired</h5>

                                            </div>
                                        </a>
                                        <!-- end .iconbox1 -->
                                    </div>

                                    <!-- end .col-md-3 col-sm-3 -->
                                </div>
                            </div>
                            <!-- end .row -->
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Top Companies-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>TOP COMPANY REGISTERED</h1>

            </div>
            <div id="company-carousel" class="owl-carousel owl-carousel-icons7">
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/1.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/2.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/3.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/4.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/5.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/brand/6.jpg') }}" alt="company1">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/Top Companies-->
@endsection
