@extends('website.layout')

@section('content')
<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page">
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <div class="p-4 mb-5">
                            <h4 class="text-left font-weight-semibold fs-16">Register With</h4>
                            <div class="btn-list d-sm-flex">
                                    <a href="{{ url('/loginEmp/google') }}" class="btn btn-secondary mb-sm-0"><i
                                            class="fa fa-google fa-1x mr-2"></i> Google</a>

                                    <a href="{{ url('/loginEmp/facebook') }}" class="btn btn-info mb-0"><i
                                            class="fa fa-facebook fa-1x mr-2"></i> Facebook</a>
                            </div>
                        </div>
                        <hr class="divider">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('emp-register') }}"  class="card-body" tabindex="500">    
                            @csrf
                            <div class="name">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                <label>Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>
                            <div class="mail">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email">
                                <label>E - Mail </label>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="name">
                                <input id="mobile" type="number"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ old('mobile') }}" autocomplete="mobile" required>
                                <label>Mobile Number</label>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="passwd">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                <label>Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="passwd">
                                <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                <label>Confirm Password</label>
                            </div>
                            <div class="submit">
                                <button class="btn btn-primary btn-block" type="submit" >Register</button>
                            </div>
                            <p class="text-dark mb-0">Already have an account?<a href="{{ route('login') }}"
                                    class="text-primary ml-1">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



