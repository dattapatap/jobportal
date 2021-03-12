@extends('website.layout')
@section('content')

    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Testimonials</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Testimonials</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->



    <!--section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Testimonials</h2>
                <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <div class="team-section text-center">
                                <div class="team-img">
                                    <img src="../assets/images/users/male/1.jpg" class="img-thumbnail rounded-circle alt="
                                        alt="">
                                </div>
                                <h4 class="font-weight-bold dark-grey-text mt-4">Tracey Poole</h4>
                                <h6 class="text-muted mb-3">Web Offlineer</h6>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fa fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Quod eos id officiis hic tenetur quae.
                                </p>
                                <div class="text-warning">
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star-half-full"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card mb-lg-0">
                        <div class="card-body">
                            <div class="team-section text-center">
                                <div class="team-img">
                                    <img src="../assets/images/users/female/1.jpg" class="img-thumbnail rounded-circle alt="
                                        alt="">
                                </div>
                                <h4 class="font-weight-bold dark-grey-text mt-4">Harry Walker</h4>
                                <h6 class="text-muted mb-3">Web Developer</h6>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fa fa-quote-left pr-2"></i>Ut enim ad minima veniam, quis nostrum
                                    exercitationem ullam quis nostrum corporis suscipit.
                                </p>
                                <div class="text-warning">
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="team-section text-center">
                                <div class="team-img">
                                    <img src="../assets/images/users/male/2.jpg" class="img-thumbnail rounded-circle alt="
                                        alt="">
                                </div>
                                <h4 class="font-weight-bold dark-grey-text mt-4">Paul White</h4>
                                <h6 class="text-muted mb-3">Photographer</h6>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fa fa-quote-left pr-2"></i>At vero eos et accusamus et iusto odio dignissimos
                                    ducimus qui blanditiis praesentium voluptatum.
                                </p>
                                <div class="text-warning">
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star"> </i>
                                    <i class="fa fa-star-o"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->

    <!-- Onlinesletter-->
    <section class="sptb border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 col-md-12">
                    <div class="input-group sub-input mt-1">
                        <input type="text" class="form-control input-lg " placeholder="Enter your Email">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary  btn-lg br-tr-3  br-br-3">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Onlinesletter-->


@endsection
