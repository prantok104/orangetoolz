<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Add New Task')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Add New Task</span></p>
            <h3>Task Create</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('task.index', ['todo_id' => $todo_id]) }}"><i class="fa-solid fa-angle-left"></i>
                Back</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        <div class="category-form-area">
            <form action="{{ route('task.store', ['todo_id' => $todo_id]) }}" method="POST" class="row w-100">
                @csrf
                <div class="col-md-12">
                    <h4 class="mb-3">Create Task</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control " id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="priority">Priority <span class="text-danger">*</span></label>
                        <select name="priority" id="priority" class="form-control">
                            <option value="">---Select the priority---</option>
                            <option value="1" {{ old('priority') == 1 ? 'selected' : '' }}>High</option>
                            <option value="2" {{ old('priority') == 2 ? 'selected' : '' }}>Medium</option>
                            <option value="3" {{ old('priority') == 3 ? 'selected' : '' }}>Low</option>
                        </select>
                        @error('priority')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="">---Select the status---</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Processing</option>
                            <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Done</option>
                            <option value="4" {{ old('status') == 4 ? 'selected' : '' }}>Checking</option>
                            <option value="5" {{ old('status') == 5 ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="order">Order <span class="text-danger">*</span></label>
                        <input type="text" name="order" class="form-control " id="order"
                            value="{{ $order }}" readonly>
                        @error('order')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button class="submit-btn">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
