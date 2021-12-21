@extends('website.layout')
@section('content')
<section class="sptb">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <style>
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 87.5%;
            color: #ff382b;
        }
        .unread{
            background-color: #1650e242;;
        }
        .read{
            background-color: white;
        }
    </style>
    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')
            <div class="col-lg-9 col-md-12 col-md-12">
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Recruiter</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Recruiter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-5 col-xl-4">
                <div class="card card-profile cover-image "  data-image-src="{{ asset('assets/images/photos/gradient3.jpg')}}">
                    <div class="card-body text-center">
                        @if($user->user->avatar)
                            <img class="card-profile-img" src="{{ asset('storage/images/profiles/'.$user->user->avatar) }}" alt="img">
                        @else
                            <img class="card-profile-img" src="{{ asset('assets/images/users/male/25.jpg')}}" alt="img">
                        @endif
                        <h3 class="mb-1 text-info">{{ $user->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="fade show active " >
                                <div class="table-responsive border">
                                    <table class="table row table-borderless w-100 m-0 ">
                                        <tbody class="col-lg-12 col-xl-12 col-md-12 p5">
                                            <div class="col-12 p-1" style="text-align: center">
                                                 <h2 class="text-info mt-2"> {{ $user->company_name }}</h2>
                                            </div>

                                           @if($user->status == 0)
                                                <div class="col-12 mt-5" style="text-align: center">
                                                    <button type="button" class="btn btn-success btn-md float-right btn-verify" id="{{ $user->id}}"><i class="fe fe-check mr-2"></i> Verify Now</button>
                                                </div>
                                           @endif
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-2">
                                            <tr>
                                                <td><strong>Contact Person :</strong> {{ $user->contact_person }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location :</strong> {{ $user->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Industry :</strong> {{ $user->industry }}</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-2">
                                            <tr>
                                                <td><strong>Website :</strong>{{ $user->website }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email :</strong> {{ $user->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone :</strong> {{ $user->user->mobile }} </td>
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
    </div>
</div>
<div class="card">
                                                                        <div class="card-header">
                                                                                <h3 class="card-title">Tabs Style</h3>

                                                                        </div>
                                                                        <div class="card-body p-6">
                                                                                <div class="panel panel-primary">
                                                                                        <div class=" tab-menu-heading">
                                                                                                <div class="tabs-menu1 ">
                                                                                                        <!-- Tabs -->
                                                                                                        <ul class="nav panel-tabs">
                                                                                                                <li class=""><a href="#tab5" class="active" data-toggle="tab">About</a></li>
                                                                                                                <li><a href="#tab6" data-toggle="tab">Contact Details</a></li>
                                                                                                                <li><a href="#tab7" data-toggle="tab">Posted Jobs</a></li>

                                                                                                        </ul>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="panel-body tabs-menu-body">
                                                                                                <div class="tab-content">
                                                                                                        <div class="tab-pane active " id="tab5">
                                                                                                            <div class="card p-5 ">
                                                                                                                <div class="card-title">
                                                                                                                    About Compan
                                                                                                                </div>
                                                                                                                <div class="media-heading">
                                                                                                                    <p>
                                                                                                                        {{ $user->about }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                             </div>
                                                                                                    </div>
                                                                                                    <div class="tab-pane " id="tab6">
                                                                                                            <div class="card p-5 ">
                                                                                                                <div class="card-title">
                                                                                                                    Contact &amp; Personal Info
                                                                                                                </div>
                                                                                                                <div class="media-list">
                                                                                                                    <div class="media mt-1 pb-2">
                                                                                                                        <div class="mediaicon">
                                                                                                                            <i class="fa fa-link" aria-hidden="true"></i>
                                                                                                                        </div>
                                                                                                                        <div class="card-body ml-5 p-1">
                                                                                                                            <h6 class="mediafont text-dark">Websites</h6><a class="d-block" href="">{{ $user->website }}</a>
                                                                                                                        </div>
                                                                                                                        <!-- media-body -->
                                                                                                                    </div>
                                                                                                                    <!-- media -->

                                                                                                                    <!-- media -->
                                                                                                                    <div class="media mt-1 pb-2">
                                                                                                                        <div class="mediaicon">
                                                                                                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                                                                                        </div>
                                                                                                                        <div class="card-body p-1 ml-5">
                                                                                                                            <h6 class="mediafont text-dark">Email </h6><span class="d-block">   {{ $user->email }} </span>
                                                                                                                        </div>
                                                                                                                        <!-- media-body -->
                                                                                                                    </div>

                                                                                                                    <!-- media -->
                                                                                                                    <div class="media mt-1 pb-2">
                                                                                                                        <div class="mediaicon">
                                                                                                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                                                                                                        </div>
                                                                                                                        <div class="card-body p-1 ml-5">
                                                                                                                            <h6 class="mediafont text-dark">Twitter</h6><a class="d-block" href="#">{{ $user->twiter}}</a>
                                                                                                                        </div>
                                                                                                                        <!-- media-body -->
                                                                                                                    </div>

                                                                                                                    <!-- media -->
                                                                                                                    <div class="media mt-1 pb-2">
                                                                                                                        <div class="mediaicon">
                                                                                                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                                                                                        </div>
                                                                                                                        <div class="card-body p-1 ml-5">
                                                                                                                            <h6 class="mediafont text-dark">LinkedIn</h6><a class="d-block" href="#">{{ $user->linkedin}}</a>
                                                                                                                        </div>
                                                                                                                        <!-- media-body -->
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- media-list -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane " id="tab7">
                                                                                                            <div class="tab-content">
                                                                                                                @forelse ($jobs as $job)
                                                                                                                    <div class="card overflow-hidden br-0 overflow-hidden">
                                                                                                                        <div class="d-md-flex">
                                                                                                                            <div class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                                                                                                <div class="card-body pt-0 pt-md-5">
                                                                                                                                    <div class="item-card9">
                                                                                                                                        <a href="{{ url('employee/viewrecruiterjob/view/'.$job->id)}}" class="text-dark"><h4 class="font-weight-semibold mt-1">{{ $job->job_title}}</h4></a>

                                                                                                                                        <div class="mt-2 mb-2">
                                                                                                                                            <a href="#" class="mr-4"><span><i class="fa fa-calendar text-muted mr-1"></i> {{ $job->created_at}} </span></a>
                                                                                                                                            <a href="#" class="mr-4"><span><i class="fa fa fa-inr text-muted mr-1"></i>{{ $job->min_salary .' - '. $job->max_salary}}</span></a>
                                                                                                                                            <a href="#" class="mr-4"><span><i class="fa fa-clock-o text-muted mr-1"></i> {{ $job->job_type }}</span></a>
                                                                                                                                            <a href="#" class="mr-4"><span><i class="fa fa-briefcase text-muted mr-1"></i> {{ $job->min_exp.' - '.$job->max_exp . ' Years Exp'}}</span></a>
                                                                                                                                            <a href="{{ url('recruiter/viewrecruiterjob/view/'.$job->id)}}" class="mr-4"><span><i
                                                                                                                                                class="fa fa-briefcase text-muted mr-1"></i>
                                                                                                                                            {{ count($job->applied ) }} - Applied</span></a>
                                                                                                                                        </div>
                                                                                                                                        <p class="mb-0 leading-tight">{!! Str::limit($job->job_desc, 160 ) !!}</p>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="card-footer pt-3 pb-3">
                                                                                                                                    <div class="item-card9-footer d-flex">
                                                                                                                                        <div class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                                                                                                            <div>
                                                                                                                                                <a href="profile.html" class="text-muted fs-12 mb-1">Posted by </a><span class="ml-1 fs-13"> Individual</span>
                                                                                                                                                <small class="d-block text-default">{{ $job->created_at}} </small>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="ml-auto">
                                                                                                                                            <a href="{{ url('job/search/'. $job->id .'/details') }}" class="btn btn-primary btn-md text-white"> <i class="fa fa-eye"></i> </a>

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
                                                                                                                            <h2 style="padding: 20px;"> No Job Posted Still....</h2>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                @endforelse
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
</section>

@endsection



@section('scripts')
    <script>
        $(document).ready(function(){
            $(function() {
                    $('.mark-as-read').click(function(e) {
                        alert();
                        let id = $(this).data('id');
                        var div = $(this);
                        $.ajax({
                                type: 'POST',
                                url: "{{ route('employee.markNotification') }}",
                                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                },
                                success: function(response) {
                                    console.log('Succes!',response);
                                    div.parent('div').parent('div').removeClass('unread');
                                    div.parent('div').parent('div').addClass("read");
                                    div.parent('div').remove();
                                },
                                error : function(err) {
                                    console.log('Error!', err.responseText);
                                },
                            });
                    });
                    $('.mark-all').click(function(e) {
                        alert();
                        console.log('mark all');
                        $.ajax({
                                type: 'POST',
                                url: "{{ route('employee.markNotification') }}",
                                data:{
                                    "_token": "{{ csrf_token() }}",

                                    id:null},
                                success: function(response) {
                                    console.log(response);
                                    $("div.unread").removeClass("unread");
                                    $("div.notifications").addClass("read");
                                },
                                error : function(err) {
                                    console.log('Error!', err.responseText);
                                },
                            });
                    });
                });
        })


    </script>
@endsection
