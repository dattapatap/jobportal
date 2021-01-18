@extends('website.layout')

@section('content')
<section class="sptb customerpage">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                <div class="single-page w-100 p-0">
                    <div class="wrapper wrapper2">
                        <form id="forgotpsd" class="card-body" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <h3 class="pb-2">Reset Password</h3>

                            <div class="mail">                                
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                               <label>Mail </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div>
                            <div class="passwd">                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label>Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="passwd">                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                               <label>Confirm Password</label>
                            
                            </div>

                            <div class="submit">
                                <button class="btn btn-primary btn-block"  type="submit" >Reset Password</button>
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

