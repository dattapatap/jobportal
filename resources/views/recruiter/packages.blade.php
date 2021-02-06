@extends('recruiter.layout.layout')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Pricing</h4>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">Free</span></div>
                    <div class="panel-body text-center">
                        <p class="display-4 mb-0">$0.00</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><span class="font-weight-semibold"> Free</span> Ad Posting</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 0 </span> Featured Ad</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> Custom </span> Reviews</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-primary" href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Premium</span></div>
                    <div class="panel-body text-center">
                        <p class="display-4 mb-0">$19</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><span class="font-weight-semibold"> Featured</span> Ad Posting</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 20 </span> Featured Ad</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> Custom </span> Reviews</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-primary" href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="ribbon ribbon-top-left text-info"><span class="bg-info">Silver</span></div>
                    <div class="panel-body text-center">
                        <p class="display-4 mb-0">$67</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><span class="font-weight-semibold"> Featured</span> Ad Posting</li>
                        <li class="list-group-item"><span class="font-weight-semibold">30 </span> Featured Ad</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> Custom </span> Reviews</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-primary" href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="ribbon ribbon-top-left text-yellow"><span class="bg-yellow">Gold</span></div>
                    <div class="panel-body text-center">
                        <p class="display-4 mb-0">$78</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><span class="font-weight-semibold"> Featured</span> Ad Posting</li>
                        <li class="list-group-item"><span class="font-weight-semibold">50 </span> Featured Ad</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 100% </span> Secure</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> Custom </span> Reviews</li>
                        <li class="list-group-item"><span class="font-weight-semibold"> 24/7</span> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-primary" href="#">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-lg-0">
                    <div class="card-body text-center">
                        <div class="card-category">Free</div>
                        <div class="display-3 my-4">$0</div>
                        <ul class="list-unstyled leading-loose">
                            <li><strong>4</strong> Ads</li>
                            <li><i class="fe fe-check text-success mr-2"></i> 30 days</li>
                            <li><i class="fe fe-x text-danger mr-2"></i> Private Messages</li>
                            <li><i class="fe fe-x text-danger mr-2"></i> Urgent Ads</li>
                        </ul>
                        <div class="text-center mt-6">
                            <a href="#" class="btn btn-secondary btn-block">Choose plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-lg-0">
                    <div class="card-status bg-green"></div>
                    <div class="card-body text-center">
                        <div class="card-category">Premium</div>
                        <div class="display-3 my-4">$65</div>
                        <ul class="list-unstyled leading-loose">
                            <li><strong>50</strong> Ads</li>
                            <li><i class="fe fe-check text-success mr-2"></i> 60 Days</li>
                            <li><i class="fe fe-x text-danger mr-2"></i> Private Messages</li>
                            <li><i class="fe fe-x text-danger mr-2"></i> Urgent ads</li>
                        </ul>
                        <div class="text-center mt-6">
                            <a href="#" class="btn btn-green btn-block">Choose plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-sm-0">
                    <div class="card-body text-center">
                        <div class="card-category">Enterprise</div>
                        <div class="display-3 my-4">$100</div>
                        <ul class="list-unstyled leading-loose">
                            <li><strong>100</strong> Ads</li>
                            <li><i class="fe fe-check text-success mr-2"></i> 180 days</li>
                            <li><i class="fe fe-check text-success mr-2"></i> Private Messages</li>
                            <li><i class="fe fe-x text-danger mr-2"></i> Urgent ads</li>
                        </ul>
                        <div class="text-center mt-6">
                            <a href="#" class="btn btn-secondary btn-block">Choose plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-0">
                    <div class="card-body text-center">
                        <div class="card-category">Unlimited</div>
                        <div class="display-3 my-4">$150</div>
                        <ul class="list-unstyled leading-loose">
                            <li><strong>Unlimited</strong> Ads</li>
                            <li><i class="fe fe-check text-success mr-2"></i> 365 Days</li>
                            <li><i class="fe fe-check text-success mr-2"></i> Private Messages</li>
                            <li><i class="fe fe-check text-success mr-2"></i> Urgent ads</li>
                        </ul>
                        <div class="text-center mt-6">
                            <a href="#" class="btn btn-secondary btn-block">Choose plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="panel-heading  text-center">
                        <h3>Personal</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><strong>$15 /</strong>  month</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><strong> 2 Free</strong> Domain Name</li>
                        <li class="list-group-item"><strong>3 </strong> One-Click Apps</li>
                        <li class="list-group-item"><strong> 1 </strong> Databases</li>
                        <li class="list-group-item"><strong> Money </strong> BackGuarntee</li>
                        <li class="list-group-item"><strong> 24/7</strong> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-lg btn-primary" href="#">Purchase Now!</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="panel-heading  text-center">
                        <h3>Team</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><strong>$25 /</strong> month</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><strong> 3 Free</strong> Domain Name</li>
                        <li class="list-group-item"><strong>4 </strong> One-Click Apps</li>
                        <li class="list-group-item"><strong> 2 </strong> Databases</li>
                        <li class="list-group-item"><strong> Money </strong> BackGuarntee</li>
                        <li class="list-group-item"><strong> 24/7</strong> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-lg btn-primary" href="#">Purchase Now!</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">

                    <div class="panel-heading  text-center">
                        <h3>Corporate</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><strong>$35 /</strong>  month</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><strong> 4 Free</strong> Domain Name</li>
                        <li class="list-group-item"><strong>6 </strong> One-Click Apps</li>
                        <li class="list-group-item"><strong> 2 </strong> Databases</li>
                        <li class="list-group-item"><strong> Money </strong> BackGuarntee</li>
                        <li class="list-group-item"><strong> 24/7</strong> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-lg btn-primary" href="#">Purchase Now!</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 col-xl-3 mt-2">
                <div class="panel price  panel-color card overflow-hidden">
                    <div class="panel-heading  text-center">
                        <h3>Business</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><strong>$99 /</strong> month</p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><strong> 5 Free</strong> Domain Name</li>
                        <li class="list-group-item"><strong>8 </strong> One-Click Apps</li>
                        <li class="list-group-item"><strong> 2 </strong> Databases</li>
                        <li class="list-group-item"><strong> Money </strong> BackGuarntee</li>
                        <li class="list-group-item"><strong> 24/7</strong> support</li>
                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-lg btn-primary" href="#">Purchase Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection