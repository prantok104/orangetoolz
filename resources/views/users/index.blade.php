<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Users')


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
                    Users</span></p>
            <h3>All Users ({{ $users->total() }})</h3>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        @forelse ($users as $key=>$user)
            <div class="orange-category-single-content green">
                <div class="orange-category-data">
                    <div class="category-title">
                        <h5><span class="mr-2">{{ $users->perPage() * ($users->currentPage() - 1) + ++$key }})</span>
                            {{ $user->name }}</h5>
                        <span class="time">Created at :- {{ $user->created_at->diffForHumans() }}</span> |
                        <span class="time">Updated at :- {{ $user->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="category-content">
                        <p><i class="fa-solid fa-envelope mr-2"></i>{{ $user->email }}</p>
                    </div>
                </div>

            </div>
        @empty
            <div class="orange-category-single-content">
                <div class="orange-category-data">
                    <div class="category-title m-0">
                        <h4 class="text-danger">No user found!</h4>
                    </div>

                </div>
            </div>
        @endforelse

        <div class="pagination d-flex justify-content-right w-100">
            {{ $users->links() }}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
