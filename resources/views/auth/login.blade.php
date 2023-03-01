<!-- ============================================================== -->
<!-- Extendas auth mater file -->
<!-- ============================================================== -->
@extends('auth.layouts.master')

<!-- ============================================================== -->
<!-- Content area -->
<!-- ============================================================== -->
@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-md-5 col-lg-5 col-md-12 mx-auto">
            <div class="orange-auth-form-content">
                <div class="orange-auth">
                    <div class="orange-auth-header">
                        <h3>Login</h3>
                        <p>Hey, enter your details to get sign in to your account.</p>
                    </div>
                    <div class="orange-auth-body">
                        <form action="{{ route('login') }}" method="POST" class="orange-auth-form">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" required
                                    autocomplete="email" value="{{ old('email') }}"
                                    class=" form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required
                                    autocomplete="current-password"
                                    class=" form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-flex gap-2 align-item-center justify-content-between">
                                    <div class="remember d-flex align-items-center">
                                        <input type="checkbox" name="remember" id="remember" class="mr-2"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="m-0">Remember Me</label>
                                    </div>
                                    <div class="forgot">
                                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-full">
                                <button type="submit" class="orange-form-button w-full">Login</button>
                            </div>
                        </form>
                        <p class="text-center"> Don't have an account?
                            <a href="{{ route('register') }}">Register now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
