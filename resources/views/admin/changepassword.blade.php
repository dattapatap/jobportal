@extends('admin.layout.layout')
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
            <h4 class="page-title">Change Password</h4>
        </div>
        <div class="row ">
            <div class="col-lg-6 offset-3">
                <form class="card" action="{{ route('admin.change.password')}}" method="POST">
                  @csrf
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" class="form-control" value="{{ old('old_password') }}" name="old_password"  placeholder="Old Password">
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control" placeholder="New Password" >
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{  $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" >
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{  $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                           
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
