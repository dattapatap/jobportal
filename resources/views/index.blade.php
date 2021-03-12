@extends('website.layout')
@section('content')

<!--Sliders Section-->
<section>
    <div class="banner1  relative slider-images">
        <div class="container-fuild">
            <!-- Carousel -->
            <div class="owl-carousel testimonial-owl-carousel2 slider slider-header ">
                <div class="item">
                    <img alt="first slide" src="{{ asset('assets/images/banners/a.jpg') }}">
                </div>
                <div class="item">
                    <img alt="first slide" src="{{ asset('assets/images/banners/b.jpg')}}">
                </div>
                <div class="item">
                    <img alt="first slide" src="{{ asset('assets/images/banners/c.jpg')}}">
                </div>
                <div class="item">
                    <img alt="first slide" src="{{ asset('assets/images/banners/d.jpg')}}">
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
                            <div class="form row no-gutters " style="background: rgb(197 195 195 / 58%);padding:15px;">
                                <div class="form-group  col-xl-4 col-lg-3 col-md-12 mb-0 bg-white ">
                                    <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4"
                                        placeholder="Search Jobs">
                                </div>
                                <div class="form-group  col-xl-3 col-lg-3 col-md-12 mb-0 bg-white">
                                    <input type="text" class="form-control input-lg br-md-0" id="text5"
                                        placeholder="Select Location">
                                    <span><img src=" {{ asset('assets/images/svg/gps.svg') }}" class="location-gps"></span>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                    <select class="form-control select2-show-search  border-bottom-0"
                                        data-placeholder="Select Category">
                                        <optgroup label="Categories">
                                            <option>All Categories</option>
                                            <option value="0">HR</option>
                                            <option>All Categories</option>
                                            <option value="1">HR</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Security</option>
                                            <option value="4">Accounts</option>
                                            <option value="5">Finance</option>
                                            <option value="6">Marketing</option>
                                            <option value="7">Commercials</option>
                                            <option value="8">Safety</option>
                                            <option value="9">Stores</option>
                                            <option value="10">Purchase</option>
                                            <option value="11">Engineering</option>
                                            <option value="12">Maintenance</option>
                                            <option value="13">Projects</option>
                                            <option value="14">Production – Plant 1,2,3,4, API</option>
                                            <option value="15">Packing – Plant 1,2, Big bag, FG</option>
                                            <option value="16">Quality Control</option>
                                            <option value="17">Research &amp; Development</option>
                                            <option value="18">Anlaytical R&amp;D</option>
                                            <option value="19">Regulatory Affairs</option>
                                            <option value="20">Management Systems</option>
                                            <option value="21">MV Lab/ Kilo Lab</option>
                                            <option value="22">IT</option>
                                            <option value="23">Microbiology</option>
                                            <option value="24">Logistics</option>
                                            <option value="25">PPIC</option>
                                            <option value="26">Operations</option>
                                            <option value="27">Others</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                    <a href="#" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0"><i
                                            class="fa fa-search mr-1"></i>Search</a>
                                </div>
                            </div>
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
                <div class="header-banner-box register" style="border: 7px solid #fff; box-shadow: 0px 0px 10px #e2e2e2;">
                    <a href="{{ url('/user-register')}}" class="btn btn-default btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i>
                        Register with us</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="header-banner-box post-job" style="border: 7px solid #fff;box-shadow: 0px 0px 10px #e2e2e2;">
                    <!--	<img src="img/verified.png" alt="">-->
                    <a href="{{ url('/upload-web-resume')}}" class="btn btn-gray btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        Upload Resume</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--section-->
<!--/section-->
<!--Featured Jobs-->
<section class="sptb bg-dark" style=" background: url({{ asset('assets/images/banners/2.jpg') }});background-attachment: fixed;">
    <div class="container" id="containe">
        <div class="section-title center-block text-center">
            <h1 style="color:white;">Latest Jobs</h1>
            <h4 style="color:white;">A better career is out there. We'll help you find it. We're your first step to
                becoming everything you want to be.</h4>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Hiring freshers For healthcare domain in Bangalore
                                        location </h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-inr  text-muted mr-1"></i> 2.3 LPA</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>0 -
                            1 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ asset('assets/images/company.jpg') }}" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default fs-13">G Technicals Solutions</a>
                                <small class="d-block text-muted">2 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card overflow-hidden">

                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Hiring Freshers For Voice Process - MNC Healthcare
                                    </h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-inr  text-muted mr-1"></i>2.1 LPA</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>0 -
                            1 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ asset('assets/images/company.jpg') }}" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default">Rosita Chatmon</a>
                                <small class="d-block text-muted">2 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn  btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card overflow-hidden">

                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Excellent Opportunity For Medical Summarization at
                                        chennai</h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-inr  text-muted mr-1"></i>4.1 LPA</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>1 -
                            5 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="assets/images/company.jpg" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default">Zealous Healthcare Services</a>
                                <small class="d-block text-muted">5 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn  btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card overflow-hidden">

                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Pharmacist Jobs in Canada</h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-usd  text-muted mr-1"></i> 50,000 - 70,000 P.A.</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>0 -
                            5 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ asset('assets/images/company.jpg') }}" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default">Izago Immigration Advisors Pvt Ltd</a>
                                <small class="d-block text-muted">4 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn  btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Manager Medical Services</h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-inr  text-muted mr-1"></i>4.1 LPA</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>1 -
                            5 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ asset('assets/images/company.jpg')}}" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default">Finejobs Consultant Private Limited
                                </a>
                                <small class="d-block text-muted">2 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn  btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text">
                                <a href="{{ url('jobs')}}" class="text-dark">
                                    <h4 class="font-weight-semibold">Medical Adviser at KK Consulting Services</h4>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body py-2">
                        <a href="mr-4" class="icons font-weight-semibold text-body"><i
                                class="fa fa-inr  text-muted mr-1"></i>2.1 LPA</a>
                        <a class="mr-4 float-right d-md-block d-none"><i class="fa fa-calendar  text-muted mr-1"></i>0 -
                            5 years</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ asset('assets/images/company.jpg')}}" class="avatar brround avatar-md mr-2" alt="avatar-img">
                            <div>
                                <a href="{{ url('jobs')}}" class="text-default">KK Consulting Services</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="{{ url('jobs')}}" class="btn  btn-sm btn-secondary text-white">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ url('jobs')}}" class="btn  btn-primary "> View More</a>
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
            <div class="item">
                <div class="card mb-0">
                    <div class="item7-card-img">
                        <a href="#"></a>
                        <img src="{{ asset('assets/images/n1.jpg')}}" alt="img" class="cover-image">
                    </div>
                    <div class="card-body p-4">
                        <div class="item7-card-desc d-flex mb-2">
                            <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>Oct-03-2020</a>
                            <div class="ml-auto">
                                <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>4 Comments</a>
                            </div>
                        </div>
                        <a href="#" class="text-dark">
                            <h4 class="font-weight-semibold">Tips to write an impressive resume online for beginner</h4>
                        </a>
                        <p>People who have just entered the workforce are still required to prepare and submit resumes
                            despite having little to no prior experience </p>
                        <div class="d-flex align-items-center pt-2 mt-auto">
                            <img src="https://scontent.fblr2-1.fna.fbcdn.net/v/t1.0-1/p160x160/73221220_2711650398856900_1120803876606312448_n.jpg?_nc_cat=103&ccb=2&_nc_sid=dbb9e7&_nc_ohc=gdKaKCCwbaUAX_w5kwK&_nc_ht=scontent.fblr2-1.fna&tp=6&oh=8f1abf16b9cbec23b696f305688f2fbd&oe=5FE31A90"
                                class="avatar brround avatar-md mr-3" alt="avatar-img">
                            <div>
                                <a href="#" class="text-default">Harish Kumar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="item7-card-img">
                        <a href="#"></a>
                        <img src="{{ asset('assets/images/n2.jpg')}}" alt="img" class="cover-image">
                    </div>
                    <div class="card-body p-4">
                        <div class="item7-card-desc d-flex mb-2">
                            <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>Nov-28-2020</a>
                            <div class="ml-auto">
                                <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>2 Comments</a>
                            </div>
                        </div>
                        <a href="#" class="text-dark">
                            <h4 class="font-weight-semibold">How to convince recuiters and get your dream job</h4>
                        </a>
                        <p>If you’re one of those people who only applies for jobs that are advertised, here’s something
                            you should know : employers are increasingly bypassing the.. </p>
                        <div class="d-flex align-items-center pt-2 mt-auto">
                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu8QHcl6n88rr3uLW7fBMQdm9FFvesILi0TV7tH8yQ=s32-c-mo"
                                class="avatar brround avatar-md mr-3" alt="avatar-img">
                            <div>
                                <a href="#" class="text-default">Dhareppa B</a>

                            </div>
                            <div class="ml-auto text-muted">
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                        class="fe fe-heart mr-1"></i></a>
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                        class="fa fa-thumbs-o-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="item7-card-img">
                        <a href="#"></a>
                        <img src="{{ asset('assets/images/n3.jpg')}}" alt="img" class="cover-image">
                    </div>
                    <div class="card-body p-4">
                        <div class="item7-card-desc d-flex mb-2">
                            <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>Oct-03-2020</a>
                            <div class="ml-auto">
                                <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>4 Comments</a>
                            </div>
                        </div>
                        <a href="#" class="text-dark">
                            <h4 class="font-weight-semibold">How do I get a job in pharmaceutical industry?</h4>
                        </a>
                        <p>Pharmaceutical industry is a field of innovation and it is well known for appreciating the
                            real talent. Pharmaceutical industry itself... </p>
                        <div class="d-flex align-items-center pt-2 mt-auto">
                            <img src="https://scontent.fblr2-1.fna.fbcdn.net/v/t1.0-1/p160x160/73221220_2711650398856900_1120803876606312448_n.jpg?_nc_cat=103&ccb=2&_nc_sid=dbb9e7&_nc_ohc=gdKaKCCwbaUAX_w5kwK&_nc_ht=scontent.fblr2-1.fna&tp=6&oh=8f1abf16b9cbec23b696f305688f2fbd&oe=5FE31A90"
                                class="avatar brround avatar-md mr-3" alt="avatar-img">
                            <div>
                                <a href="#" class="text-default">Harish Kumar</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="item7-card-img">
                        <a href="#"></a>
                        <img src="{{ asset('assets/images/n4.jpg')}}" alt="img" class="cover-image">
                    </div>
                    <div class="card-body p-4">
                        <div class="item7-card-desc d-flex mb-2">
                            <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i>Nov-28-2020</a>
                            <div class="ml-auto">
                                <a href="#"><i class="fa fa-comment-o text-muted mr-2"></i>2 Comments</a>
                            </div>
                        </div>
                        <a href="#" class="text-dark">
                            <h4 class="font-weight-semibold">5 Career Options in Pharmaceutical Industry</h4>
                        </a>
                        <p>India is one of the leading global producers of affordable and cost-effective medicines and
                            vaccines. Skilled and trained professionals play an integral... </p>
                        <div class="d-flex align-items-center pt-2 mt-auto">
                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu8QHcl6n88rr3uLW7fBMQdm9FFvesILi0TV7tH8yQ=s32-c-mo"
                                class="avatar brround avatar-md mr-3" alt="avatar-img">
                            <div>
                                <a href="#" class="text-default">Dhareppa B</a>

                            </div>
                            <div class="ml-auto text-muted">
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                        class="fe fe-heart mr-1"></i></a>
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i
                                        class="fa fa-thumbs-o-up"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!--Blogs-->
<section class="sptb bg-white" style=" background: url({{ asset('assets/images/banners/1.jpg')}});background-attachment: fixed;">
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
                                                        src="{{ asset('assets/images/ic1.png') }}" style="hvoer:red;"></i> </div>
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
                                                        src="{{ asset('assets/images/ic2.png')}}" style="hvoer:red;"></i> </div>
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
                                                        src="{{ asset('assets/images/ic3.png')}}" style="hvoer:red;"></i> </div>
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
                                                        src="{{ asset('assets/images/ic4.png')}}" style="hvoer:red;"></i></div>
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
                                                        src="{{ asset('assets/images/ic5.png')}}" style="hvoer:red;"></i> </div>
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
                                                    class=" effect-1"><img src="{{ asset('assets/images/ic6.png')}}"
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
                        <img src="{{ asset('assets/images/brand/1.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/brand/2.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/brand/3.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/brand/4.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/brand/5.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-0">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/brand/6.jpg')}}" alt="company1">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--/Top Companies-->
@endsection
