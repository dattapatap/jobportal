@extends('website.layout')

@section('content')
<section class="sptb customerpage">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                <div class="single-page w-100 p-0">
                    <div class="wrapper wrapper2">
                        <form id="forgotpsd" class="card-body" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="pb-2">Forgot password</h3>


                            <div class="mail">                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                <label>Mail or Username</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="submit">
                                <button class="btn btn-primary btn-block"  type="submit" >Send</button>
                            </div>
                            <div class="text-center text-dark mb-0">
                                Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

