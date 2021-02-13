@extends('website.layout')

@section('content')

<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page">
                <div class="col-lg-5 col-xl-4 col-md-7 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <div class="p-4 mb-5">
                            <h4 class="text-left font-weight-semibold fs-16">Login With</h4>
                            <div class="btn-list d-sm-flex">
                                <a href="{{ url('loginEmp/google/emp') }}" class="btn btn-secondary mb-sm-0"><i
                                        class="fa fa-google fa-1x mr-2"></i> Google</a>

                                <a href="{{ url('loginEmp/facebook/emp') }}" class="btn btn-info mb-0"><i
                                        class="fa fa-facebook fa-1x mr-2"></i> Facebook</a>
                            </div>
                        </div>
                        <hr class="divider">
                        @if (\Session::has('error'))
                            <div class="alert alert-warning">
                                <ul>
                                    <li style="font-size: 12px;">{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <form method="POST" id="login" class="card-body" tabindex="500" action="{{ route('login-employee') }}" >
                        @csrf

                            <div class="mail">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" 
                                    autocomplete="email" autofocus>
                               
                                <label>Mail or Username</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="passwd">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                     autocomplete="current-password">

                                    <label>Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="submit">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                            @if(Route::has('password.request'))
                                   <p class="mb-2"><a href="{{ route('password.request') }}">Forgot Password</a></p>
                            @endif
                            <p class="text-dark mb-0">Don't have account?<a href="{{ route('register') }}"
                                    class="text-primary ml-1">Sign UP</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



