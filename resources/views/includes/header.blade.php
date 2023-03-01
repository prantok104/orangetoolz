<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ ENV('APP_NAME') }}</title>
    {{-- Fontawesome css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/fontawesome/css/all.min.css') }}">

    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/bootstrap/css/bootstrap.min.css') }}">

    {{-- Normalize css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/normalize/css/normalize.css') }}">

    {{-- Toastr css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/toastr/css/toastr.min.css') }}">

    {{-- Select2 css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/select2/css/select2.min.css') }}">

    {{-- Theme css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Responsive css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    {{-- Add custom css --}}
    @stack('css')
</head>

<body>
