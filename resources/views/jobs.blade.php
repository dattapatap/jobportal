@extends('website.layout')
@section('content')

<!--Breadcrumb-->
<div class="bg-white border-bottom">
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Available Jobs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Jobs</li>
            </ol>
        </div>
    </div>
</div>
<!--/Breadcrumb-->

<!--Job listing-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <!--Left Side Content-->
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control br-tl-3 br-bl-3" placeholder="Search">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary br-tr-3 br-br-3">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <div class="card-body">
                        <div class="" id="container">
                            <div class="filter-product-checkboxs">
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox1"
                                        value="option1">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">HR<span
                                                class="label label-secondary float-right">14</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox2"
                                        value="option2">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Admin<span
                                                class="label label-secondary float-right">22</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox3"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Security<span
                                                class="label label-secondary float-right">78</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox4"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Accounts<span
                                                class="label label-secondary float-right">35</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox5"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Finance<span
                                                class="label label-secondary float-right">23</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox6"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Marketing<span
                                                class="label label-secondary float-right">14</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Commercials<span
                                                class="label label-secondary float-right">45</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Safety<span
                                                class="label label-secondary float-right">34</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Stores<span
                                                class="label label-secondary float-right">12</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Purchase<span
                                                class="label label-secondary float-right">18</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">TEngineering<span
                                                class="label label-secondary float-right">02</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Maintenance<span
                                                class="label label-secondary float-right">15</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Projects<span
                                                class="label label-secondary float-right">32</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Production – Plant 1,2,3,4, API<span
                                                class="label label-secondary float-right">23</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Packing – Plant 1,2, Big bag, FG<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Quality Control<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Research &amp; Development<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Anlaytical R&amp;D<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Regulatory Affairs<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label> <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Management Systems<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">MV Lab/ Kilo Lab<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">IT<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Microbiology<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Logistics<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label> <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">PPIC<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>

                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Operations<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                                <label class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="checkbox7"
                                        value="option3">
                                    <span class="custom-control-label">
                                        <a href="#" class="text-dark">Others<span
                                                class="label label-secondary float-right">19</span></a>
                                    </span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="card-header border-top">
                        <h3 class="card-title">Salary Range</h3>
                    </div>
                    <div class="card-body">
                        <h6>
                            <label for="price">Salary Range:</label>
                            <input type="text" id="price">
                        </h6>
                        <div id="mySlider"></div>
                    </div>
                    <div class="card-header border-top">
                        <h3 class="card-title">Job Type</h3>
                    </div>
                    <div class="card-body">
                        <div class="filter-product-checkboxs">
                            <label class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="checkbox1" value="option1">
                                <span class="custom-control-label">
                                    Part time
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
                                <span class="custom-control-label">
                                    Full time
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
                                <span class="custom-control-label">
                                    Work From Home
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
                                <span class="custom-control-label">
                                    Internship
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="card-header border-top">
                        <h3 class="card-title">Experience Type</h3>
                    </div>
                    <div class="card-body">
                        <div class="filter-product-checkboxs">
                            <label class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="checkbox1" value="option1">
                                <span class="custom-control-label">
                                    Fresher
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
                                <span class="custom-control-label">
                                    Experienced
                                </span>
                            </label>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-warning btn-block">Apply Filter</a>
                    </div>
                </div>

            </div>
            <!--/Left Side Content-->

            <div class="col-xl-9 col-lg-8 col-md-12">
                <!--Job lists-->
                <div class=" mb-lg-0">
                    <div class="">
                        <div class="item2-gl">
                            <div class=" mb-0">
                                <div class="">
                                    <div class="p-5 bg-white item2-gl-nav d-flex">
                                        <h6 class="mb-0 mt-3">Showing <b>1 to 10</b> of 30 Entries</h6>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                        <div class="d-md-flex">
                                            <div class="p-0 m-0 item-card9-img">
                                                <div class="item-card9-imgs">
                                                    <a href="jobs-detail.html"></a>
                                                    <img src="http://digitalnock.com/images/logo1.png" alt="img"
                                                        class="">
                                                </div>
                                            </div>
                                            <div
                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                <div class="card-body pt-0 pt-md-5">
                                                    <div class="item-card9">
                                                        <a href="jobs-detail.html" class="text-dark">
                                                            <h4 class="font-weight-semibold mt-1">Inside Sales
                                                                Specialist
                                                            </h4>
                                                        </a>
                                                        <div class="mt-2 mb-2">
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                    DigitalNock</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-map-marker text-muted mr-1"></i>
                                                                    Bangalore</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa fa-inr text-muted mr-1"></i> 10,000
                                                                    - 15,000</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-clock-o text-muted mr-1"></i> Full
                                                                    Time</span></a>
                                                            <a href="#" class="mr-4"><span><i
                                                                        class="fa fa-briefcase text-muted mr-1"></i> 2
                                                                    Yer Exp</span></a>
                                                        </div>
                                                        <p class="mb-0 leading-tight">Maintain and expand the company
                                                            database of prospects.
                                                            - Reaching out to prospective clients using Linked In,
                                                            Mails, Phone, Other Medium.
                                                            - Cold-call prospects that are generated by external sources
                                                            of lead.</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-3 pb-3">
                                                    <div class="item-card9-footer d-flex">
                                                        <div
                                                            class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                            <div>
                                                                <a href="profile.html"
                                                                    class="text-muted fs-12 mb-1">Posted by </a><span
                                                                    class="ml-1 fs-13"> Individual</span>
                                                                <small class="d-block text-default">18 Mar 2020, 12:15
                                                                    AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="jobs-detail.html" class="mr-3"><i
                                                                    class="fa fa-user text-muted mr-1"></i>Sales/Marketing</a>

                                                            <a href="jobs-detail.html"
                                                                class="btn btn-primary mt-3 mt-sm-0"> Apply Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="center-block text-center">
                    <ul class="pagination mb-0">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/Job lists-->
    </div>
    </div>
    </div>
</section>


@endsection
