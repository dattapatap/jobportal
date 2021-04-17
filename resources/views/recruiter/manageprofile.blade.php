@extends('recruiter.layout.layout')
@section('content')
<style>
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: .25rem;
        font-size: 87.5%;
        color: #ff382b;
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Edit Profile</h4>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <form class="card" action="{{ route('recruiter.profile.manageprofile')}}" method="POST">
                  @csrf
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
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

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Company Neme</label>
                                    <input type="text" class="form-control" value=" {{ old('comp_name', $user->company_name) }} " name="comp_name"  placeholder="Company Name" readonly>
                                    @error('comp_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contact Person Name</label>
                                    <input type="text" name="contact_person" value="{{ old('contact_person', $user->contact_person) }}" class="form-control" placeholder="Company Name" >
                                    @error('contact_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{  $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" value="{{ old('email',Auth::user()->email) }}" class="form-control" placeholder="Email" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="mobile" value="{{ old('mobile', Auth::user()->mobile )}}" class="form-control" placeholder="Phone Number" >
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="location" value="{{ old('location', $user->location )}}" class="form-control" placeholder="City"  >
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Industry</label>
                                    <input type="text" name="proffession" value="{{ old('proffession',$user->proffession) }}" class="form-control" placeholder="Industry" >
                                    @error('proffession')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" value="{{ old('website',$user->website) }}" class="form-control" placeholder="website" >
                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Twiter</label>
                                    <input type="text" name="twiter" value="{{ old('twiter', $user->twiter) }}" class="form-control" placeholder="twiter" >
                                    @error('twiter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" name="linkedin" value="{{ old('linkedin', $user->linkedin )}}" class="form-control" placeholder="LinkedIn">
                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Company</label>
                                    <textarea rows="5" name="about" class="form-control" placeholder="Enter About your description" >{{ old('about',$user->about) }}</textarea>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
