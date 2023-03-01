<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Add New Item')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Add New Item</span></p>
            <h3>Item Create</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('todo.index') }}"><i class="fa-solid fa-angle-left"></i> Back</a>
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
            <form action="{{ route('todo.store') }}" method="POST" class="row w-100">
                @csrf
                <div class="col-md-12">
                    <h4 class="mb-3">Create Item</h4>
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
                        <label for="category">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-control">
                            <option value="">---Select the category---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? ' selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tags">Tags <span class="text-danger">*</span></label>
                        <select name="tags[]" id="tags" class="form-control select2" multiple="multiple"
                            data-placeholder="---Select the tags---">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ old('tags') == $tag->id ? ' selected' : '' }}>
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="is_favourite">Is Faourite?<span class="text-danger">*</span></label>
                        <select name="is_favourite" id="is_favourite" class="form-control">
                            <option value="1" {{ old('is_favourite') == '1' ? ' selected' : '' }}>Favourite</option>
                            <option value="0" {{ old('is_favourite') == '0' ? ' selected' : '' }}>Not</option>
                        </select>
                        @error('is_favourite')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">( Optional )</span></label>
                        <textarea type="text" name="description" class="form-control " id="description">{{ old('description') }}</textarea>
                        @error('description')
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
