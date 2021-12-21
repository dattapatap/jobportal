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
							<h1 class="">Frequently Asked Question</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Breadcrumb-->

		<!--How to work-->

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
					<div class="col-md-12">
						<div class="bg-light p-0 box-shadow2 border-transparent">
							<div class="card-body text-center pb-5">
								<div class="bg-white icon-bg  icon-service text-purple mb-4">
									<img src="{{ asset('assets/images/svgs/jobs/faq.png')}}" alt="img">
								</div>
								<h6 class="card-bold mb-4"><b>FAQ</b></h6>
								<p style="text-align: left">
                                    <b>What is the IndiaPharma network?</b><br>
                                    When we talk about the IndiaPharma network, we mean the websites and applications owned or controlled by IndiaPharma Worldwide, Inc. These include IndiaPharma's job search websites, the IndiaPharma Communities, Fastweb.com, Military.com, and other apps published by IndiaPharma, and any other property that we create or acquire. Information may be shared among any of the sites or applications in the IndiaPharma network, but it will always be used as described in the privacy policy of the site or application where it was collected. You should read the privacy policy carefully to understand how it applies to information collected on the site or application you are using.
                                </p>
                                <p style="text-align: left">
                                    <b>Since your website is free, are you selling my information?</b><br>
                                    You may have heard that advertising and sales of lists allow many sites to offer services without charge to users. We do sell advertising space on our site as well, but we don't share your contact information with marketers unless you give us your consent, such as by responding to an ad on our site, signing up for partner offers, or publicly posting information on IndiaPharma or other sites. In addition, we allow employers to advertise their open positions and access our database of resumes and profiles for candidates qualified for those positions.
                                </p>
                                <p style="text-align: left">
                                    <b>What information does IndiaPharma store about me in its database?</b><br>
                                    When you use IndiaPharma, we store the following information about you in our database:
                                </p>
                                <p style="text-align: left">
                                    1. Information collected directly from you, such as your name, contact information (e.g., address, email address, telephone number), and resume. We collect your ZIP code, postal code, preferences, occupation, career history, interests, and favorites. We may also collect your age, gender, race or ethnicity, if permitted by local law and you choose to give it to us, such as when you create an account. View more information on creating your account.
                                </p>
                                <p style="text-align: left">
                                    <b>What information does IndiaPharma store about me in its database?</b><br>
                                    We use your information to enable you to manage your career, to build a professional network, to troubleshoot problems, to prevent fraud, to serve personalized advertising, and to help us improve the services we offer to you. We may also use your information to contact you about IndiaPharma site updates, conduct surveys, or informational and service-related communications, including important security updates.
                                </p>
                                <p style="text-align: left">
                                    <b>Does IndiaPharma sell my personal information?</b><br>
                                    IndiaPharma does not sell your contact information to marketers, unless you authorize us to provide marketers with that information. It is a violation of our Terms of Use for companies to purchase access to our resume and profile database and use it for marketing. If a company uses your resume or profile to market products to you, let us know so we can investigate the matter.
                                </p>
							</div>
						</div>
					</div>
					{{-- <div class="col-md-6">
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
					</div> --}}
				</div>
			</div>
		</section>
		<!--section-->


@endsection
