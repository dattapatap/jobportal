@extends('website.layout')

@section('content')

<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page">
                <div class="col-lg-5 col-xl-4 col-md-7 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <div class="p-4 mb-2">
                            <h4 class="text-left font-weight-semibold fs-16 text-center" style="margin-bottom:0px;">Admin Login</h4>
                        </div>
                        <!-- <hr class="divider"> -->
                        @if (\Session::has('error'))
                            <div class="alert alert-warning">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <!-- <hr class="divider"> -->
                        <form method="POST" id="login" class="card-body" tabindex="500" action="{{ route('admin-login') }}" >
                        @csrf

                            <div class="mail">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required placeholder="User Id"
                                    autocomplete="email" tabindex="1" autofocus="">
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
                                    required autocomplete="current-password" tabindex="2"  placeholder="password">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



