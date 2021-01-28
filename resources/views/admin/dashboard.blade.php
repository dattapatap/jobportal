@extends('admin.layout.layout')

@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="counter-status dash3-counter">
                            <div class="counter-icon bg-primary text-primary">
                                <i class="icon icon-people text-white"></i>
                            </div>
                            <h5>Jobs</h5>
                            <h2 class="counter">1554</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="counter-status dash3-counter">
                            <div class="counter-icon bg-info text-info">
                                <i class="icon icon-rocket text-white"></i>
                            </div>
                            <h5>Total Leads</h5>
                            <h2 class="counter">1068</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="counter-status dash3-counter">
                            <div class="counter-icon bg-success text-success">
                                <i class="icon icon-docs text-white"></i>
                            </div>
                            <h5>Total Placements</h5>
                            <h2 class="counter">512</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="counter-status dash3-counter">
                            <div class="counter-icon bg-danger text-danger">
                                <i class="icon icon-emotsmile text-white"></i>
                            </div>
                            <h5>Happy Employes</h5>
                            <h2 class="counter">4388</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recruitment History</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="purchase" class=" chartjs-render-monitor chart-dropshadow2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-12">
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body card-1">
                            <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i
                                        class="fa fa-bolt"></i></span></div>
                            <img src="{{ asset('assets/images/products/logo/logo1.jpg')}}" alt="img"
                                class=" avatar avatar-xxl brround mx-auto">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="text-center">
                                        <div class="item-card2-text mt-3">
                                            <a href="company-list.html" class="text-dark">
                                                <h4 class="font-weight-bold">Web Developer jobs</h4>
                                            </a>
                                        </div>
                                        <p class="">Emergin</p>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li class=""><a href="#" class="icons"><i
                                                        class="si si-location-pin text-muted mr-1"></i> Los Angles</a>
                                            </li>
                                            <li><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i> 5
                                                    hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i
                                                        class="si si-user text-muted mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-2"><a href="#" class="icons"><i
                                                        class="si si-briefcase text-muted mr-1"></i> 2 Yrs Exp</a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center">
                                        <a href="company-details.html" class="btn   btn-white btn-sm mt-2">5
                                            Positions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class=" w-100">
                                <a class="float-left w-50 text-center p-2 border-right text-muted" href="#"><i
                                        class="fa fa-clock-o mr-1"></i> Part Time</a>
                                <a class=" float-left w-50 text-center p-2  text-muted" href="#"><i
                                        class="fa fa-usd mr-1"></i> 32 - 40</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3 col-lg-6">
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body card-2">
                            <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i
                                        class="fa fa-bolt"></i></span></div>
                            <img src="{{ asset('assets/images/products/logo/logo2.jpg')}}" alt="img"
                                class=" avatar avatar-xxl brround mx-auto">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="text-center">
                                        <div class="item-card2-text mt-3">
                                            <a href="company-list.html" class="text-dark">
                                                <h4 class="font-weight-bold">Software Developer Jobs</h4>
                                            </a>
                                        </div>
                                        <p class="">Pro.Meet</p>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li class=""><a href="#" class="icons"><i
                                                        class="si si-location-pin text-muted mr-1"></i> Los Angles</a>
                                            </li>
                                            <li><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i> 9
                                                    hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i
                                                        class="si si-user text-muted mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-2"><a href="#" class="icons"><i
                                                        class="si si-briefcase text-muted mr-1"></i> 4 Yrs Exp</a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center">
                                        <a href="company-details.html" class="btn   btn-white btn-sm mt-2">3
                                            Positions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class=" w-100">
                                <a class="float-left w-50 text-center p-2 border-right text-muted" href="#"><i
                                        class="fa fa-clock-o mr-1"></i> Full Time</a>
                                <a class=" float-left w-50 text-center p-2  text-muted" href="#"><i
                                        class="fa fa-usd mr-1"></i> 50 - 60</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-xl-4 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="card-title">Dailywise Placement Feedback</div>
                    </div>
                    <div class="card-body">
                        <div id="echart5" class="chartsh"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Employers analytics</div>
                    </div>
                    <div class="card-body overflow-hidden">
                        <div id="placeholder4" class="chartsh"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">Placement Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix row mb-4">
                            <div class="col">
                                <div class="float-left">
                                    <h5 class="mb-0"><strong>Total Jobs</strong></h5>
                                    <small class="text-muted">weekly Applied</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <h4 class="font-weight-bold mb-0 mt-2 text-primary">$15300</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix row mb-4">
                            <div class="col">
                                <div class="float-left">
                                    <h5 class="mb-0"><strong>Total vacancies</strong></h5>
                                    <small class="text-muted">weekly Interwied</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <h4 class="font-weight-bold mt-2 mb-0 text-success">$1625</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix row mb-4">
                            <div class="col">
                                <div class="float-left">
                                    <h5 class="mb-0"><strong>Total Placements</strong></h5>
                                    <small class="text-muted">weekly Shortlisted</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <h4 class="font-weight-bold mt-2 mb-0 text-warning">70%</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix row mb-4">
                            <div class="col">
                                <div class="float-left">
                                    <h5 class="mb-0"><strong>Total Placements</strong></h5>
                                    <small class="text-muted">weekly shortlisted</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <h4 class="font-weight-bold mt-2 mb-0 text-danger">50%</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix row mb-0">
                            <div class="col">
                                <div class="float-left">
                                    <h5 class="mb-0"><strong>Total Leads</strong></h5>
                                    <small class="text-muted">weekly selected</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <h4 class="font-weight-bold mt-2 mb-0 text-secondary">30%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jobs List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top mb-0 ">
                            <table class="table table-bordered table-hover text-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Candidate</th>
                                        <th>Designation</th>
                                        <th>Interview Date</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Joanne Nash</td>
                                        <td>Delivery Jobs</td>
                                        <td>07-12-2018</td>
                                        <td class="font-weight-semibold fs-16">1yrs</td>
                                        <td>
                                            <a href="#" class="badge badge-success">Working</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phil Vance</td>
                                        <td>Teacher/Lecturer</td>
                                        <td>25-18-2018</td>
                                        <td class="font-weight-semibold fs-16">3yrs</td>
                                        <td>
                                            <a href="#" class="badge badge-danger">Searching</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Samantha Slater</td>
                                        <td>Nurse</td>
                                        <td>02-12-2018</td>
                                        <td class="font-weight-semibold fs-16">2yrs</td>
                                        <td>
                                            <a href="#" class="badge badge-success">Working</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
