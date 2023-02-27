<!-- ============================================================== -->
<!-- Extendas errors mater file -->
<!-- ============================================================== -->
@extends('errors::layouts')
@section('title', 'Forbidden')
@section('code', '403')
@section('message', $exception->getMessage() ?: 'Forbidden')
