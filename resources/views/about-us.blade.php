@extends('website.layout')
@section('content')
<style>
     .breadcrumb-item a {
        color: rgb(255 255 255);
    }

</style>


		<!--Breadcrumb-->
		<section>
			<div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="../assets/images/banners/banner2.jpg">
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 class="">About Us</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Breadcrumb-->

		<!--How to work-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h2>How It Works?</h2>
					<p>Say hello to your dream job with IPJ</p>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="mb-lg-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic1.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Create Account</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="mb-lg-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic2.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Take a Test</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="mb-sm-0 mb-4">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic3.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Get Score</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic4.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Search Jobs</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic5.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Save and Apply</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-lg-2 col-md-6 col-sm-4">
						<div class="">
							<div class="">
								<div class="service-card text-center">
									<div class="bg-light icon-bg icon-service text-purple about">
										<img src="{{ asset('assets/images/ic6.png')}}" alt="img">
									</div>
									<div class="servic-data mt-3">
										<h4 class="font-weight-semibold mb-2">Get Hired</h4>
										{{-- <p class="text-muted mb-0">Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus</p> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/How to work-->

        <!--Statistics-->
		{{-- <section>
			<div class="about-1 cover-image bg-background-color" data-image-src="../assets/images/banners/banner5.jpg">
				<div class="content-text mb-0 text-white info">
					<div class="container">
						<div class="row text-center no-gutters">
							<div class="col-lg-3 col-md-6">
								<div class="counter-status md-mb-0 sptb bg-black-transparent-1 mt-5 mt-md-0 mt-5 mt-md-0">
									<div class="counter-icon">
										<i class="fa fa-users"></i>
									</div>
									<h5>Members</h5>
									<h2 class="counter mb-0">2569</h2>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter-status status-1 md-mb-0 sptb bg-black-transparent-2">
									<div class="counter-icon text-warning">
										<i class="fa fa-rocket"></i>
									</div>
									<h5>Jobs</h5>
									<h2 class="counter mb-0">1765</h2>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter-status status md-mb-0 sptb bg-black-transparent-1">
									<div class="counter-icon text-primary">
										<i class="fa fa-building-o"></i>
									</div>
									<h5>Companies</h5>
									<h2 class="counter mb-0">846</h2>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter-status status sptb bg-black-transparent-2 mb-5 mb-md-0">
									<div class="counter-icon text-success">
										<i class="fa fa-smile-o"></i>
									</div>
									<h5>Happy Customers</h5>
									<h2 class="counter mb-0">7253</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<!--/Statistics-->

    	<!--section-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="row no-gutters row-deck find-job">
					<div class="col-md-6">
						<div class="bg-light p-0 box-shadow2 border-transparent">
							<div class="card-body text-center pb-5">
								<div class="bg-white icon-bg  icon-service text-purple mb-4">
									<img src="{{ asset('assets/images/svgs/jobs/find.svg')}}" alt="img">
								</div>
								<h6 class="card-title mb-4">For the Job Seekers</h6>
								<p style="text-align: left">
                                    The opportunities in pharma industry are made easy to find with IPJ. At
                                    first glance, you’ll realize that IPJ isn’t just a job portal: its so much more
                                    than that. All that a Jobseeker have to do is undertake a test and get
                                    registered. Upon registration , JS shall enter their skill sets and
                                    preferred location for job openings and Apply on jobs with matching JD.
                                </p>
                                <p style="text-align: left">
                                    With its numerous filters and customized options, IPJ makes it easy for
                                    prospective job seekers to cut through the clutter and land upon the
                                    exact opportunity suited for your needs.
                                </p>
                                <p style="text-align: left">
                                    As IPJ directly connects candidates and companies together, you can
                                    be assured that your application and resume is being seen by the
                                    absolute right people.
                                </p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="bg-white p-0 mt-5 mt-md-0 border box-shadow2">
							<div class="card-body text-center pb-5">
								<div class="bg-light icon-bg  icon-service text-purple mb-4">
									<img src="{{ asset('assets/images/svgs/jobs/work.svg')}}" alt="img">
								</div>
								<h6 class="card-title  mb-4">For the Employers</h6>
								<p style="text-align: left">
                                    With its Stringent test and results, IPJ provides platform that allows
                                    employers to Target their Jobs To Only Right resource. It allows to
                                    Connect with largest pool of right candidates in lesser time.
                                </p>
                                <p style="text-align: left">
                                    Led by a team of strategists and Pharma domain experts, IPJ is a truly
                                    integrated human resource web portal which delivers thought-through
                                    HR plans executed for its clients from Pharma vertical.
                                </p>
                                <p style="text-align: left">
                                    IPJ is amongst the few organizations that takes care of every need of
                                    the pharmaceutical industry – from Senior Level Recruitment to
                                    Volume Hiring, to providing Corporate Support Team.

                                </p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--section-->


@endsection
