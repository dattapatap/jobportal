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


        <div class="row row-cards">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center feature">
                        <div class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                            <i class="icon icon-people text-primary"></i>
                        </div>
                        <p class="card-text mt-3 mb-3">Total Posted Jobs</p>
                        <p class="h2 text-center text-primary"> {{ $totjobs }}</p>
                    </div>
                </div>
            </div><!-- COL END -->

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center feature">
                        <div class="fa-stack fa-lg fa-1x icons shadow-default bg-secondary-transparent">
                            <i class="icon icon-refresh text-secondary"></i>
                        </div>
                        <p class="card-text mt-3 mb-3">Total Employer Registered</p>
                        <p class="h2 text-center text-secondary">2,635</p>
                    </div>
                </div>
            </div><!-- COL END -->

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center feature ">
                        <div class="fa-stack fa-lg fa-1x icons shadow-default bg-info-transparent">
                            <i class="icon icon-speech text-info"></i>
                        </div>
                        <p class="card-text mt-3 mb-3">Total Employee Registered</p>
                        <p class="h2 text-center text-success-1">245</p>
                    </div>
                </div>
            </div><!-- COL END -->

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center feature">
                        <div class="fa-stack fa-lg icons shadow-default bg-warning-transparent">
                            <i class="icon icon-rocket text-warning"></i>
                        </div>
                        <p class="card-text mt-3 mb-3">Total Candidate Viewd</p>
                        <p class="h2 text-center text-secondary-1">5,459</p>
                    </div>
                </div>
            </div><!-- COL END -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Jobs List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Employer</th>
                                        <th>Posted</th>
                                        <th>Category</th>
                                        <th>Total Openings</th>
                                        <th>Interested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($postedJobs as $item)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{ $item->jobrole->name }}</td>
                                            <td>{{ $item->recruiter->company_name }}</td>
                                            <td>{{ $item->created_at}}</td>
                                            <td>
                                                <a href="#" class="badge badge-warning"> {{ $item->industry->name }}</a>
                                            </td>
                                            <td>  {{ $item->job_tot_positions }}</td>
                                            <td > {{ $item->job_tot_positions }} </td>
                                            <td>
                                                @if($item->status)
                                                    <a href="#" class="badge badge-success"> Active </a>
                                                @else
                                                    <a href="#" class="badge badge-danger"> InActive </a>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a> --}}
                                                <a  href="{{ url('recruiter/postedjobs/view/'.$item->id)}}"  class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center;">
                                            No Jobs found
                                        </td>
                                    </tr>

                                    @endforelse
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
