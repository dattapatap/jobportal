@extends('website.layout')
@section('content')
<style>
    .breadcrumb-item a {
        color: rgb(255 255 255);
    }
</style>

    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                <h4 class="page-title">Job Detail</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                    <li class="breadcrumb-item" ><a href="{{ url('/jobs')}}">Jobs </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Job Details</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12">

                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                    @endif

                    <!--Jobs Description-->
                    <div class="card overflow-hidden">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col">
                                    <div class=" mb-0">
                                        {{-- <div class="d-md-flex"> --}}
                                            {{-- <img src="{{ asset('assets/images/products/logo/img1.jpg') }}" class="w-20 h-20" alt="user"> --}}
                                            <div class="ml-4">
                                                <a class="text-dark">
                                                    <h4 class="mt-3 mb-1 fs-20 font-weight-bold">{{ $job->job_title}} </h4>
                                                </a>
                                                <div class="" style="margin-bottom: 20px">
                                                    <ul class="mb-0 d-flex">
                                                        <li class="mr-3"><a class="icons"><i
                                                                    class="si si-briefcase text-muted mr-1"></i> {{ $job->recruiter->company_name }} </a></li>
                                                        <li class="mr-3">
                                                            <a class="icons"><i class="si si-location-pin text-muted mr-1"></i>{{ $job->location->name }}
                                                            </a>
                                                        </li>
                                                        <li class="mr-3"><a class="icons"><i class="fa fa fa-calendar text-muted mr-1"></i>{{ $job->min_exp.' To '.$job->max_exp }} years</a></li>
                                                        <li class="mr-3"><a href="#" class="icons"><i class="fa fa-calendar text-muted mr-1"></i> {{ $job->created_at->diffForHumans() }}</a></li>

                                                    </ul>
                                                </div>
                                                <div class="icons" style="float: right;">
                                                    @if(isset($jobapplied))
                                                       <a href="javascript:void(0)" class="btn btn-info icons" disabled><i class="fa fa-check mr-1"></i>Applied</a>
                                                    @else
                                                        <a href="{{ url('job/'. $job->id.'/apply')}}" class="btn btn-info icons"><i class="fa fa-check mr-1"></i>Apply</a>
                                                        @if(isset($jobSaved))
                                                            <a href="javascript:void(0)" class="btn btn-primary icons" disabled><i class="fa fa-save mr-1"></i>Saved</a>
                                                        @else
                                                            <a href="{{ url('job/'. $job->id.'/save')}}" class="btn btn-primary icons"><i class="fa fa-save mr-1"></i>Save </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h4 class="mb-4 card-title">Job Description</h4>
                            <div class="mb-4">
                                {!! html_entity_decode($job->job_desc) !!}
                            </div>
                            <h4 class="mb-4 card-title">Job Details</h4>
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="table-responsive">
                                        <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Job
                                                            Type</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span> {{ $job->job_type}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Role</span>
                                                    </td>
                                                    <td><span>:</span></td>
                                                    <td><span> {{ $job->jobrole->name}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Salary</span>
                                                    </td>
                                                    <td><span>:</span></td>
                                                    <td> <i class="fa fa-inr"></i><span> {{ $job->min_salary.'-'.$job->max_salary}} </span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Experience Leval</span>
                                                    </td>
                                                    <td><span>:</span></td>
                                                    <td> <i class="fa fa-calendar"></i><span> {{ $job->min_exp.' - '.$job->max_exp}} Years </span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold"> Industry </span></td>
                                                    <td><span>:</span></td>
                                                    <td><span> {{ $job->industry->name}} </span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span
                                                            class="font-weight-semibold">Location</span></td>
                                                    <td><span>:</span></td>
                                                    <td><i class="si si-location-pin"></i><span> {{ $job->location->name}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-id">
                                <div class="row">
                                    <div class="col">
                                        <a class="mb-0">Job ID : ##{{ $job->id }}</a>
                                    </div>
                                    <div class="col col-auto">
                                        Posted By <a class="mb-0 font-weight-bold"> {{ $job->recruiter->company_name }} </a> /  {{ \Carbon\Carbon::parse($job->created_at)->format('d-M-Y')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--Jobs Description-->
                </div>
                <!--Right Side Content-->
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Jobs you might be interested in</h3>
                        </div>
                        <div class="card-body pb-3">
                            <ul class="vertical-scroll">
                                @if(isset($relatedJobs))
                                    @forelse ($relatedJobs as $item)
                                        <li class="item">
                                            <div class="item-det card-body">
                                                <a href="#" class="text-dark">
                                                    <h4 class="mb-2 fs-16 font-weight-semibold">{{ $item->job_title }}</h4>
                                                </a>
                                                <small class="text-muted">
                                                    <i class="fa fa-inr text-muted"></i>{{ $item->min_salary.' - '.$item->max_salary }}
                                                    <i class="si si-location-pin text-muted ml-3"></i> {{ $item->location->name }}
                                                </small>
                                                <div class="icons mt-3 pb-0 ">
                                                    {{-- <a href="#" class="btn btn-primary btn-sm icons"> Apply</a> --}}
                                                    <a href="{{ url('job/search/'. $item->id .'/details') }}" class="btn btn-primary btn-sm icons"> View Details</a>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <span style="text-align: center;"> No similar job found</span>
                                    @endforelse
                                @else
                                    <span style="text-align: center;"> No similar job found</span>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section>

@endsection
@section('scripts')
<script>
    $(document).ready(function(e){
            console.log('console');

    });

</script>
@endsection
