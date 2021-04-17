@extends('recruiter.layout.layout')
@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title"> Jobs </h4>
        </div>
        <div class="m-0">
            <a href="{{ url('recruiter/postedjobs')}}" class="btn btn-info btn-md pr-5"> <i class="fa fa-arrow-left ml-1 pr-2"></i> Back </a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card overflow-hidden">
                    {{-- <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">Urgent</span></div> --}}
                    <div class="card-body h-100">
                        <div class="row">
                            <div class="col">
                                <div class="profile-pic mb-0">
                                    <div class="d-md-flex">
                                        {{-- <img src="{{ asset('assets/images/products/logo/img1.jpg')}}" class="w-20 h-20" alt="user"> --}}
                                        <div class="ml-4">
                                            <a href="" class="text-dark"><h4 class="mt-3 mb-1 fs-20 font-weight-bold">{{ $jobs->job_title }}</h4></a>
                                            <div class="">
                                                <ul class="mb-2" style="font-size: 15px;">
                                                    <li class="mr-3 mt-2"><a href="#" class="icons"><i class="si si-briefcase text-muted mr-1"></i> {{ $jobs->industry->name }} </a></li>
                                                    <li class="mr-3 mt-2"><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i> {{ $jobs->location->name }}</a></li>
                                                    <li class="mr-4 mt-2"><a href="#" class="icons"><i class="fa fa-inr text-muted mr-3"></i>{{ $jobs->min_salary.' - '.$jobs->max_salary }} </a></li>
                                                    <li class="mr-4 mt-2"><a href="#" class="icons"><i class="fa fa-inr text-muted mr-3"></i>{{ $jobs->job_type }} </a></li>
                                                    <li class="mr-3 mt-2"><a href="#" class="icons"><i class="si si-calendar text-muted mr-1"></i> {{ $jobs->created_at->diffForHumans() }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h4 class="mb-4 card-title">Job Description</h4>
                        <div class="mb-4">
                            {!! $jobs->job_desc  !!}
                        </div>
                        <h4 class="mb-4 card-title">Job Details</h4>
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Job Type</span></td> <td><span>:</span></td> <td><span> {{ $jobs->job_type }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Role</span></td> <td><span>:</span></td> <td><span> {{ $jobs->jobrole->name }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Min Salary</span></td> <td><span>:</span></td> <td><span> <i class="fa fa-inr text-muted"></i> {{ $jobs->min_salary }}  </span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Max Salary</span></td> <td><span>:</span></td> <td><span> <i class="fa fa-inr text-muted"></i> {{ $jobs->max_salary }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Total Openings</span></td> <td><span>:</span></td> <td><span> {{ $jobs->job_tot_positions }}</span></td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Industry</span></td> <td><span>:</span></td> <td><span>{{ $jobs->industry->name }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Min Exp</span></td> <td><span>:</span></td> <td><span>{{ $jobs->min_exp }} yrs</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Max Exp</span></td> <td><span>:</span></td> <td><span> {{ $jobs->max_exp }} yrs</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Locality</span></td> <td><span>:</span></td> <td><span> {{ $jobs->location->name }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-150 px-0"><span class="font-weight-semibold">Eligibility</span></td> <td><span>:</span></td> <td><span> {{ $jobs->job_eligibility }} </span></td>
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
                                    <a class="mb-0">Job ID : ##{{ $jobs->id}}</a>
                                </div>
                                <div class="col">
                                    <a class="mb-0">Applied : @if(isset($jobs->applied)) {{ count($jobs->applied )}} @endif</a>
                                </div>
                                <div class="col col-auto">
                                    Posted By <a class="mb-0 font-weight-bold"></a> / {{ $jobs->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-header border-top">
                        <h4 class="card-title"> Applied Candidates</h4>
                    </div>
                    <div class="card-body border-top">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Applied Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if(isset($jobs->applied))
                                        @php  $ctr=1; @endphp
                                        @forelse ($jobs->applied as $item)
                                        <tr>
                                            <th scope="row"> {{ $ctr }}</th>
                                            <td> <a href="javascript:void(0);">{{ $item->employee->first_name.' '. $item->employee->last_name }} </a></td>
                                            <td>{{ $item->created_at }}</td>
                                            @php $ctr++; @endphp
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" style="text-align: center;"> No one applied this job </td>
                                            </tr>
                                        @endforelse
                                    @endif
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
