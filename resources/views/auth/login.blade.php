@extends('layouts.auth')

@section('css')

<style>
    .invalid-feedback {
        display: block;
    }

    .user-auth-v2 .auth-left-section {
        background: url({{ config('app.url') }}/dist/images/login-v2.png) no-repeat;
        background-color: #ffffff;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: contain;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        justify-content: center;
    }
</style>

@endsection

@section('content')
<div class="row no-gutters">
    <div class="col-11 col-sm-11 col-lg-10 col-xl-8 mx-auto">
            <div class="card card-margin">
                    <div class="card-body p-0">
                            <div class="row no-gutters">
                                    <div class="col-lg-6">
                                            <div class="user-auth-content">
                                                    <form action="{{ route('login') }}" class="needs-validation" novalidate method="post">
                                                        @csrf
                                                            <div class="input-group">
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                                        id="exampleInputEmail1" name="email" placeholder="Email" required autocomplete="current-email">
                                                                    <i data-feather="shield"></i>
                                                            </div>
                                                            
                                                            <div class="input-group">
                                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                                                        id="exampleInputPassword1"  name="password" placeholder="Password" required autocomplete="current-password">
                                                                    <i data-feather="unlock"></i>
                                                            </div>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <div class="form-footer-link">
                                                                    <div class="string-check string-check-bordered-base mb-2 left-side">
                                                                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                            <label class="string-check-label" for="formCheckInput">
                                                                                    <span class="ml-2">Remember Me</span>
                                                                            </label>
                                                                    </div>
                                                                    <a href="{{ route('password.request') }}" class="text-capitalize right">Forgot Password?</a>
                                                            </div>
                                                            <div class="mb-3 d-block">
                                                                    <button type="submit" class="btn btn-base btn-lg btn-sbt">LOG IN</button>
                                                            </div>
                                                            <div class="form-register-link">
                                                                    Have no account?<a href="{{ route('register') }}" class="text-capitalize right">Sign Up Now</a>
                                                            </div>
                                                    </form>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 d-none d-md-block">
                                            <div class="auth-left-section">
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>
</div>
@endsection
