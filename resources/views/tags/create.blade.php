<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Add New Tag')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Add New Tag</span></p>
            <h3>Tag Create</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('tags.index') }}"><i class="fa-solid fa-angle-left"></i> Back</a>
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
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <h4 class="mb-3">Create Tag</h4>
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control " id="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ old('status') == '1' ? ' selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? ' selected' : '' }}>Deactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="submit-btn">save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
