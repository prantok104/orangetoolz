<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Edit Category')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Edit Category</span></p>
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('categories.index') }}"><i class="fa-solid fa-angle-left"></i> Back</a>
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
            <form action="{{ route('categories.update', encrypt($category->id)) }}" method="POST">
                @method('PUT')
                @csrf
                <h4 class="mb-3">Edit Category</h4>
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control " id="name" value="{{ $category->name }}">
                    @error('name')
                        <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="text-danger">( Optional )</span></label>
                    <textarea type="text" name="description" class="form-control " id="description">{{ $category->description }}</textarea>
                    @error('description')
                        <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $category->status == '1' ? ' selected' : '' }}>Active</option>
                        <option value="0" {{ $category->status == '0' ? ' selected' : '' }}>Deactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="submit-btn">update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
