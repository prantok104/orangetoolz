<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Access Control --}}
    <meta name="Access-Control-Allow-Origin" content="*" />

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title') | {{ ENV('APP_NAME') }}</title>

    {{-- Favicon --}}
    <link href="{{ asset('favicon.png') }}" rel="icon" type="image/png">

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

    {{-- SlickNav-1.0.10 css --}}
    <link rel="stylesheet" href="{{ asset('assets/libraries/SlickNav-1.0.10/css/slicknav.min.css') }}">

    {{-- Theme css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Responsive css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    {{-- Add custom css --}}
    @stack('css')
</head>

<body>
