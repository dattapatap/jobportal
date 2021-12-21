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
							<h1 class="">Privacy Policy</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active text-white" aria-current="page">Privacy Policy</li>
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
									<img src="{{ asset('assets/images/svgs/jobs/policy.svg')}}" alt="img">
								</div>
								<h6 class="card-bold mb-4"><b>Privacy Policy</b></h6>
								<p style="text-align: left">
                                    <b>Scope of this Privacy Policy</b><br>
                                    This privacy policy applies to information we collect or use on sites and applications owned or controlled by IndiaPharma Worldwide, Inc. or its affiliated companies ("IndiaPharma").
                                </p>
                                <p style="text-align: left">
                                    <b>Information We Collect</b><br>
                                    We collect information about you when you use IndiaPharma. We collect information directly from you such as your contact information, resume, and profile information. We also collect information about you automatically such as how you use and interact with IndiaPharma, your demographic information, and information about your computer or mobile device.
                                </p>
                                <p style="text-align: left">
                                    We may collect or use information about you from publicly-available websites whether or not you have an account with us. You will have the opportunity to claim or request removal of the information. However we cannot guarantee that we will not later collect from publicly-available websites other information that pertains to you.
                                </p>
                                <p style="text-align: left">
                                    We may also acquire information about you from third parties to further personalize and enhance your experience.
                                </p>
                                <p style="text-align: left">
                                    <b>How We Use Information</b><br>
                                    We use the information we collect about you to deliver the products and services we offer, respond to you, and operate and improve our sites and applications. Our services include showing you personalized content and advertising on IndiaPharma or other sites with which we have a business relationship. We may use your information to contact you about IndiaPharma updates, conduct surveys, or to provide informational and service-related communications, including important security updates.
                                </p>
                                <p style="text-align: left">
                                    Information you share in public areas of IndiaPharma or make visible in the resume and profile database may be accessed, used, and stored by others around the world. We strive to provide a safe environment by attempting to limit access to our database to legitimate users, but we cannot guarantee that unauthorized parties will not gain access. We also cannot control how authorized users store or transfer information you give to us, so you should not post sensitive information to IndiaPharma.
                                </p>
                                <p style="text-align: left">
                                    <b>How We Share Information</b><br>
                                    We do not share contact information with third parties for their direct marketing purposes without your consent.
                                </p>
                                <p style="text-align: left">
                                    If you apply to a job, provide your contact information to show interest in a job, or reply to a message from an employer, we share your information with employer and who may use your data and contact you for employment related purposes.
                                </p>
                                <p style="text-align: left">
                                    We share your information with third parties who help us deliver our products and services to you. These third parties may not use your information for any other purpose.
                                </p>
                                <p style="text-align: left">
                                    We may share information with third parties if you consent. For example, we may use your information to contact you about products or services available from IndiaPharma or our affiliates. If you opt in, we may supply your information to third parties who may contact you about their products or services. You may change your contact preferences by adjusting your notification settings.
                                </p>
                                <p style="text-align: left">
                                    We may disclose to third parties information that we have collected from other websites.
                                </p>
                                <p style="text-align: left">
                                    We disclose information where legally required
                                </p><p style="text-align: left">
                                    We may disclose and transfer information to a third party who acquires any or all of IndiaPharma's business units.
                                </p><p style="text-align: left">
                                    <b>Access to Your Personal Information</b><br>
                                    We store your information to make your interaction with IndiaPharma more efficient, practical, and relevant. You may access, review, correct, update, or delete your resume or profile any time by signing in to your account.
                                </p><p style="text-align: left">
                                    You may request a copy of the information we have about you or the deletion of information you have provided to us.
                                </p><p style="text-align: left">
                                    <b>Contact Information</b><br>
                                    You may contact us online for questions or concerns about our privacy practices or our Privacy Shield participation. You may also write to us at:
                                    No.1, Hundred Feet Road, 5th Block,
                                    Koramangala, Bangalore -560 095,
                                    India
                                    info@globalcalcium.com
                                    91-80-40554500
                                    91-80-25530807
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
