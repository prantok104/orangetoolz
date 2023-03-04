<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ ENV('APP_NAME') }}</title>
    {{-- Fontawesome css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/fontawesome/css/all.min.css') }}">

    {{-- Favicon --}}
    <link href="{{ asset('favicon.png') }}" rel="icon" type="image/png">

    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/bootstrap/css/bootstrap.min.css') }}">

    {{-- Normalize css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/normalize/css/normalize.css') }}">

    {{-- Theme css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Responsive css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    {{-- Add custom css --}}
    @stack('css')
</head>

<body>

    <div class="orange-error-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
                    <div class="orange-error-content">
                        <div class="orange-errors-message">
                            <strong>@yield('code')</strong>
                            <p>OPPS! @yield('message')</p>
                            <a href="{{ route('dashboard') }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('assets/libraries/jquery/js/jquery-3.5.1.min.js') }}"></script>

    {{-- Mordanizer js --}}
    <script src="{{ asset('assets/libraries/modernizr/js/modernizr-3.11.2.min.js') }}"></script>

    {{-- Boostrap js --}}
    <script src="{{ asset('assets/libraries/bootstrap/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('assets/libraries/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- Custom js --}}
    @stack('js')
</body>

</html>
