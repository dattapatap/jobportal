@extends('admin.layout.layout')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
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
                                            <div class="col-12" style="text-align: center">       
                                                @if($user->status)
                                                    <h4 class="text-success float-right"><strong> Verified </strong> </h4>
                                                @else
                                                    <h4 class="text-danger float-right"> <strong> UnVerified </strong></h4>
                                                @endif
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
                                <div class="row mt-5 profie-img">
                                    <div class="col-md-4">
                                        <div class="media-heading">
                                             <h5><strong>Package Selected</strong></h5>                                       
                                            <div class="col-md-12 text-center p-5">
                                               <h3><strong class="text-info">Premium</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="media-heading">
                                            <h5><strong>Available Points</strong></h5>                                       
                                            <div class="col-md-12 text-center p-5">
                                               <h3><strong class="text-info">130.00</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="media-heading">
                                            <h5><strong>Total Posted Jbs</strong></h5>                                       
                                            <div class="col-md-12 text-center p-5">
                                               <h3><strong class="text-info">{{ count($user->jobs)}}</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>    

                                <div class="row mt-5 profie-img">
                                    <div class="col-md-12">
                                        <div class="media-heading">
                                            <h5><strong>About Company</strong></h5>                                       
                                           <p>
                                               {{ $user->about }}
                                           </p>
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
@endsection

@section('scripts')
<script src="{{asset('js/recruiter/profile.js')}}"> </script>   
<script>
        $('.btn-verify').click(function(){
            event.preventDefault();
            var userid = $(this).attr("id");
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/admin/recruiter/verify',
                data: { id: userid },
                success: function(data) {
                    if(data.success){
                        console.log(data.message);
                        toastr.success(data.message);
                        location.reload();
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            });
        })
</script>
@endsection