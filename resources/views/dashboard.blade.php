<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Todo Application')

<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')
    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Dashboard</span></p>
            <h3>Dashboard</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('categories.index') }}"><i class="fa-solid fa-plus"></i> Add new todo list</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        <div class="row">
            <div class="col-md-3">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Todo Lists</h4>
                        <span>20</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Categories</h4>
                        <span>{{ $data['categories_count'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Tags</h4>
                        <span>{{ $data['tags_count'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Users</h4>
                        <span>{{ $data['users_count'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
