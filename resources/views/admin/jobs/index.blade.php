@extends('admin.layout.layout')
@section('content')

    <div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"> Jobs List </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--Job lists-->
                    <div class=" mb-lg-0">
                        <div class="">
                            <div class="item2-gl">
                                <div class="tab-content">
                                    @forelse ($jobs as $job)

                                        <div class="card overflow-hidden br-0 overflow-hidden">
                                            <div class="d-md-flex">
                                                <div class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                    <div class="card-body pt-0 pt-md-5">
                                                        <div class="item-card9">
                                                            <a href="{{ url('admin/jobs/view/' . $job->id) }}"
                                                                class="text-dark">
                                                                <h4 class="font-weight-semibold mt-1">{{ $job->job_title }}
                                                                </h4>
                                                            </a>
                                                            @if ($job->status)
                                                                <span class="text-success float-right"> Active </span>
                                                            @else
                                                                <span class="text-danger float-right"> InActive </span>
                                                            @endif
                                                            <div class="mt-2 mb-2">
                                                                <a href="#" class="mr-4"><span><i
                                                                            class="fa fa-calendar text-muted mr-1"></i>
                                                                        {{ $job->created_at }} </span></a>
                                                                <a href="#" class="mr-4"><span><i
                                                                            class="fa fa fa-inr text-muted mr-1"></i>{{ $job->min_salary . ' - ' . $job->max_salary }}</span></a>
                                                                <a href="#" class="mr-4"><span><i
                                                                            class="fa fa-clock-o text-muted mr-1"></i>
                                                                        {{ $job->job_type }}</span></a>
                                                                <a href="#" class="mr-4"><span><i
                                                                            class="fa fa-briefcase text-muted mr-1"></i>
                                                                        {{ $job->min_exp . ' - ' . $job->max_exp . ' Years Exp' }}</span></a>
                                                            </div>
                                                            <p class="mb-0 leading-tight">{!! Str::limit($job->job_desc, 160)
                                                                !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer pt-3 pb-3">
                                                        <div class="item-card9-footer d-flex">
                                                            <div class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                                <div>
                                                                    <a href="profile.html" class="text-muted fs-12 mb-1">Posted
                                                                        by </a><span class="ml-1 fs-13"> Individual</span>
                                                                    <small class="d-block text-default">{{ $job->created_at }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <a href="#" class="mr-3"><i
                                                                        class="fa fa-user text-muted mr-1"></i>{{ $job->recruiter->company_name }}</a>
                                                                <a href="{{ url('admin/jobs/view/' . $job->id) }}"
                                                                    class="btn btn-primary btn-md text-white"> <i
                                                                        class="fa fa-eye"></i> </a>
                                                                {{-- @if ($job->status)
                                                                    <a href="{{ url('jobs/view/status/' . $job->id) }}"
                                                                        class="btn btn-danger btn-md text-white"> In Active </a>
                                                                @else
                                                                    <a href="{{ url('jobs/view/status/' . $job->id) }}"
                                                                        class="btn btn-success btn-md text-white"> Active </a>
                                                                @endif --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @empty
                                        <div class="card overflow-hidden br-0 overflow-hidden">
                                            <div class="d-md-flex">
                                                <div class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                    <h2 style="padding: 20px;"> No Job Available....</h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="text-center float-right">
                                <ul class="pagination mb-0">
                                    {{ $jobs->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/Job lists-->
                </div>

            </div>

        </div>
    </div>


@endsection
