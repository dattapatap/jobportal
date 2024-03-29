@extends('admin.layout.layout')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
        </div>
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

        <div class="row">
            <div class="col-lg-5 col-xl-4">
                <div class="card card-profile cover-image "  data-image-src="{{ asset('assets/images/photos/gradient3.jpg')}}">
                    <div class="card-body text-center">
                        @if(Auth::user()->avatar)
                            <img class="card-profile-img" src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}" alt="img">
                        @else
                            <img class="card-profile-img" src="{{ Avatar::create( Auth::user()->name )->toBase64();  }}" alt="img">
                        @endif
                        <h3 class="mb-1 text-info">{{ Auth::user()->name }}</h3>
                        <a href="#" class="btn btn-success btn-sm mt-2 btnProfilePic"><i class="fa fa-pencil" aria-hidden="true"></i> Edit profile</a>
                    </div>
                </div>
                <div class="card p-5 ">
                    <div class="card-title">
                        Contact &amp; Personal Info
                    </div>
                    <div class="media-list">
                        <!-- media -->
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
                                                 <h2 class="text-info mt-2"> {{ $user->name }}</h2>
                                            </div>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-2">
                                            <tr>
                                                <td><strong>Company :</strong> {{ $user->company }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location :</strong> {{ $user->location }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Billing Address :</strong> {{ $user->address }}</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-2">
                                            <tr>
                                                <td><strong>GST :</strong> {{ $user->gst }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email :</strong> {{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone :</strong> {{ $user->mobile }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-5 profie-img">
                                    <div class="col-md-12">
                                        @if (isset($user->about))
                                            <div class="media-heading">
                                            <h5><strong>About Company</strong></h5>
                                            <br>
                                            <p>
                                                {{ $user->about }}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-success btn-sm pull-right"  href="{{ url('admin/editprofile') }}">Edit Profile</a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="profilepic" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 350px !important;min-width:300px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Upload Profile Pictute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="profileupload" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="">
                                <input type="file" name="profile_pic" id="profile_pic" class="dropify" data-height="180" required />
                                <span id="image-input-error" style="color: red;font-size:12px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"> Upload </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/fileuploads/js/dropify.js')}}"></script>
<script src="{{ asset('assets/plugins/fileuploads/js/dropfy-custom.js')}}"></script>
<script src="{{asset('js/admin/profile.js')}}"> </script>
<script>
    $(document).ready(function(){
        $('.btnProfilePic').click(function(){
            $('#profilepic').modal('show');
        });
    });
</script>
@endsection
