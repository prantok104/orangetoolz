<!-- ============================================================== -->
<!-- Extendas auth mater file -->
<!-- ============================================================== -->
@extends('auth.layouts.master')

<!-- ============================================================== -->
<!-- Content area -->
<!-- ============================================================== -->
@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-md-5 col-lg-5 col-md-12 mx-auto">
            <div class="orange-auth-form-content">
                <div class="orange-auth">
                    <div class="orange-auth-header">
                        <h3>Register Now</h3>
                        <p>Hey, Enter your details to get sign up to your account.</p>
                    </div>
                    <div class="orange-auth-body">
                        <form action="{{ route('register') }}" method="POST" class="orange-auth-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" required
                                    value="{{ old('name') }}" autocomplete="off"
                                    class=" form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" required
                                    autocomplete="off" value="{{ old('email') }}"
                                    class=" form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required autocomplete="off"
                                    class=" form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class=" form-control @error('password_confirmation') is-invalid @enderror">
                            </div>

                            <div class="form-group w-full mt-3">
                                <button type="submit" class="orange-form-button w-full">Create Account</button>
                            </div>
                        </form>
                        <p class="text-center"> Have an account?
                            <a href="{{ route('login') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
