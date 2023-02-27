<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Categories')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>All
                    Categories</span></p>
            <h3>All Categories ({{ $categories->count() }})</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('categories.create') }}"><i class="fa-solid fa-plus"></i> Add new category</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        @forelse ($categories as $category)
            <div class="orange-category-single-content">
                <div class="orange-category-data">
                    <div class="category-title">
                        <h4><span class="mr-2">1)</span> Web Development</h4>
                        <span>- 5 min ago</span>
                    </div>
                    <div class="category-content">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque omnis similique excepturi error
                        </p>
                    </div>
                </div>
                <div class="ornage-category-action">

                </div>
            </div>
        @empty
            <div class="orange-category-single-content">
                <div class="orange-category-data">
                    <div class="category-title m-0">
                        <h4 class="text-danger">No category found!</h4>
                    </div>

                </div>
            </div>
        @endforelse
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
