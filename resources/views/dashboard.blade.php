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
            <p class="profile">Hi, {{ auth()->user()->name }}</p>
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
            <div class="col-lg-3 col-md-6">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Todo Lists</h4>
                        <span>{{ $data['todos_count'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Categories</h4>
                        <span>{{ $data['categories_count'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Tags</h4>
                        <span>{{ $data['tags_count'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="orange-single-card">
                    <div class="card-title">
                        <h4>Connectors</h4>
                        <span>{{ $data['users_count'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="favourite mr-2">
            <h6 class="mt-2">Favourite Items</h6>
            @php
                $todos = $data['favourites'];
            @endphp
            @forelse ($todos as $key=>$todo)
                <div class="orange-category-single-content green">
                    <div class="orange-category-data">
                        <div class="category-title">
                            <h5><span class="mr-2">{{ $todos->perPage() * ($todos->currentPage() - 1) + ++$key }})</span>
                                {{ $todo->name }}</h5>
                            <span class="time">- {{ $todo->updated_at->diffForHumans() }}</span>
                            <span class="time">
                                {!! $todo->is_favourite == 1
                                    ? '<span class="text-warning"><i class="fa-solid fa-star"></i> Favourite</span>'
                                    : '' !!}</span>
                        </div>
                        <div class="category-content">
                            <p>{{ $todo->description }}</p>
                            <div class="category-tags mt-2">
                                <div class="orange-cat">
                                    <span class="category ml-4">{{ @$todo->categories->name }}</span>
                                </div>
                                <div class="orange-tags">
                                    @if (count(@$todo->tags) > 0)
                                        <small>Tags: </small>
                                    @endif
                                    @foreach (@$todo->tags as $tag)
                                        <span>{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ornage-category-action">
                        <a href="{{ route('task.index', ['todo_id' => encrypt($todo->id)]) }}"
                            title="Tasks ({{ @$todo->tasks_count }})"><i
                                class="fa-solid fa-briefcase text-success"></i></a>
                        <a href="{{ route('todo.edit', encrypt($todo->id)) }}" title="EDIT"><i
                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                        <a href="javascript:void(0)" title="DELETE" onclick="return deleteItem({{ $todo->id }})"><i
                                class="fa-solid fa-trash text-danger"></i></a>
                    </div>
                </div>
            @empty
                <div class="orange-category-single-content">
                    <div class="orange-category-data">
                        <div class="category-title m-0">
                            <h4 class="text-danger">No item found!</h4>
                        </div>

                    </div>
                </div>
            @endforelse

            <div class="pagination d-flex justify-content-right w-100">
                {{ $todos->links() }}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
