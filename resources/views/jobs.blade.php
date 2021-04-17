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
                        @php
                            if(isset($_GET['top_search'])){
                                $topserch =  $_GET['top_search'];
                            }else{
                                $topserch =  '';
                            }
                         @endphp

                        <form id="frmTopSearch" action="{{url('jobs/topsearch')}}">
                            <div class="input-group">
                                <input type="text" name="top_search" id="top_search" class="form-control br-tl-3 br-bl-3" value="{{$topserch}}" placeholder="Search" required>
                                <div class="input-group-append ">
                                    <button type="submit" class="btn btn-primary br-tr-3 br-br-3">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card">
                    <form action="{{url('jobs/job-filter')}}" method="GET">

                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            @php
                               if(isset($_GET['category'])){
                                    $arrCategory =  $_GET['category'];
                                }else{
                                    $arrCategory =  array();
                                }

                                if(isset($_GET['job_type'])){
                                    $arrJobType =  $_GET['job_type'];
                                }else{
                                    $arrJobType =  array();
                                }

                                if(isset($_GET['locations'])){
                                    $arrLocation =  $_GET['locations'];
                                }else{
                                    $arrLocation =  array();
                                }

                                if(isset($_GET['experience'])){
                                    $arrExperience =  $_GET['experience'];
                                }else{
                                    $arrExperience =  array();
                                }

                            @endphp
                            <div class="card-body">
                                <div class="" id="container" >
                                    <div class="filter-product-checkboxs">
                                        @foreach ($industry as $item)
                                                <label class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" name="category[]"
                                                        value="{{ $item->id }}"{{ in_array($item->id, $arrCategory)?'checked':''}}>
                                                    <span class="custom-control-label">
                                                        <a class="text-dark">{{ $item->name }}</a>
                                                    </span>
                                                </label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <div class="card-header border-top">
                                <h3 class="card-title">Salary Range</h3>
                            </div>
                            <div class="card-body">
                                <h6>
                                    <input type="hidden" id="minsalery" name="minsalery" class="form-control" {{ (isset($_GET['minsalery']))? 'value='.$_GET["minsalery"]:'' }}>
                                    <input type="hidden" id="maxsalery" name="maxsalery" class="form-control" {{ (isset($_GET['maxsalery']))? 'value='.$_GET["maxsalery"]:'' }} >
                                    <input type="text" id="price" name="price" class="form-control" readonly>
                                </h6>
                                <div id="mySlider"></div>
                            </div>


                            <div class="card-header border-top">
                                <h3 class="card-title">Job Type</h3>
                            </div>
                            <div class="card-body">
                                <div class="filter-product-checkboxs">
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="job_type[]" value="Part Time" {{ in_array('Part Time', $arrJobType)?'checked':''}} >
                                        <span class="custom-control-label">
                                            Part time
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="job_type[]" value="Full Time" {{ in_array('Full Time', $arrJobType)?'checked':''}}>
                                        <span class="custom-control-label">
                                            Full time
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="job_type[]" value="Work From Jome" {{ in_array('Work From Jome', $arrJobType)?'checked':''}}>
                                        <span class="custom-control-label">
                                            Work From Home
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="job_type[]" value="Internship" {{ in_array('Internship', $arrJobType)?'checked':''}}>
                                        <span class="custom-control-label">
                                            Internship
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="card-header border-top">
                                <h3 class="card-title">Locations</h3>
                            </div>
                            <div class="card-body">
                                <div class="" id="container1" >
                                    <div class="filter-product-checkboxs">
                                        @foreach ($locations as $item)
                                                <label class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" name="location[]"
                                                        value="{{ $item->id }}"{{ in_array($item->id, $arrLocation)?'checked':''}}>
                                                    <span class="custom-control-label">
                                                        <a class="text-dark">{{ $item->name }}</a>
                                                    </span>
                                                </label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                            <div class="card-header border-top">
                                <h3 class="card-title">Experience Type</h3>
                            </div>
                            <div class="card-body">
                                <div class="filter-product-checkboxs">
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="experience[]" value="0" {{ in_array(0, $arrExperience)?'checked':''}}>
                                        <span class="custom-control-label">
                                            Fresher
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" name="experience[]" value="1" {{ in_array(1, $arrExperience)?'checked':''}}>
                                        <span class="custom-control-label">
                                            Experienced
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning btn-block">Apply Filter</button>
                            </div>
                    </form>
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
                                        @if(isset($jobs))
                                               <h6 class="mb-0 mt-3">Showing <b>{{ $jobs->firstItem() }} to {{ $jobs->lastItem() }}</b> of <b> {{ $jobs->total() }}</b>
                                                 Entries</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    @forelse ($jobs as $items)
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
                                                                    <h4 class="font-weight-semibold mt-1"> {{$items->job_title }}</h4>
                                                                </a>
                                                                <div class="mt-2 mb-2">
                                                                    <a href="#" class="mr-4"><span><i class="fa fa-building-o text-muted mr-1"></i> XXXXXX</span></a>
                                                                    <a href="#" class="mr-4"><span><i class="fa fa-map-marker text-muted mr-1"></i>  {{$items->location->name }} </span></a>
                                                                    <a href="#" class="mr-4"><span><i class="fa fa fa-inr text-muted mr-1"></i>  {{$items->min_salary.'-'.$items->max_salary }} </span></a>
                                                                    <a href="#" class="mr-4"><span><i class="fa fa-clock-o text-muted mr-1"></i> {{$items->job_type}}</span></a>
                                                                    <a href="#" class="mr-4"><span><i class="fa fa-briefcase text-muted mr-1"></i> {{$items->min_exp .'-'. $items->max_exp }} Years</span></a>
                                                                </div>
                                                                <p class="mb-0 leading-tight">
                                                                    {!!  Str::limit($items->job_desc, 150 ) !!}
                                                                </p>
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
                                                                        <small class="d-block text-default">{{ $items->created_at->diffForHumans()}}</small>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    <a class="mr-3"><i class="fa fa-user text-muted mr-1"></i>{{ $items->jobrole->name }}  </a>
                                                                    <a href="{{ url('job/search/'. $items->id .'/details') }}" class="btn btn-info mt-3 mt-sm-0"> View Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>\
                                                </div>
                                            </div>
                                    @empty

                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h3 class="text-warning" style="text-align: center;padding: 20px;"> No Jobs Found, Please try another keyword </h3>
                                                </div>
                                            </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="center-block float-right">
                    {{ $jobs->links()}}
                    {{-- <ul class="pagination mb-0">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <!--/Job lists-->
    </div>
    </div>
    </div>
</section>


@endsection

@section('scripts')
<script>
    // var minSal = "{{(isset($_GET['minsalery']))? $_GET['minsalery']:''}}";
    // var maxSal = "{{(isset($_GET['maxsalery']))? $_GET['maxsalery']:''}}";

    // // $( "#price" ).val( "₹" + minSal + " - ₹" + maxSal );

    // setTimeout(function(){ alertFunc(minSal, maxSal); }, 1000);
    // function alertFunc(minSal, maxSal) {

    //     $('#price').slider( "options", "min", minSal );
    //     $('#price').slider( "options", "max", maxSal );
    //     $('#price').slider( "options", "value", $('#price').slider("value"));

    //     $('#minsalery').val(minSal);
    //     $('#maxsalery').val(maxSal);
    // }

    // $( "#price" ).change();

    // $(document).ready(function(){

    // });
</script>
@endsection
