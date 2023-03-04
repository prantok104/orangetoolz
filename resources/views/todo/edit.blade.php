<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Edit Item')


<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
@section('content')

    <!-- ============================================================== -->
    <!-- Breadcrumb area start -->
    <!-- ============================================================== -->
    <div class="orange-breadcrumb-area-start d-flex align-items-center justify-content-between">
        <div class="orange-breadcrumb-left">
            <p><span>{{ env('APP_NAME') }}</span> / <span>Edit Item</span></p>
            <h3>{{ $todo->name }}</h3>
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
            <form action="{{ route('todo.update', encrypt($todo->id)) }}" method="POST" class="row w-100">
                @method('PUT')
                @csrf
                <div class="col-md-12">
                    <h4 class="mb-3">Edit Item</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control " id="name"
                            value="{{ $todo->name }}">
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
                                    {{ $todo->category_id == $category->id ? ' selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tags">Tags <span class="text-danger">(Optional)</span></label>
                        <select name="tags[]" id="tags" class="form-control select2" multiple="multiple"
                            data-placeholder="---Select the tags---">
                            @php
                                $selectd_tags = [];
                                foreach (@$todo->tags as $key => $tag) {
                                    $selectd_tags[] = $tag->id;
                                }
                            @endphp
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $selectd_tags) ? ' selected' : '' }}>
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="is_favourite">Is Faourite?<span class="text-danger">*</span></label>
                        <select name="is_favourite" id="is_favourite" class="form-control">
                            <option value="1" {{ $todo->is_favourite == '1' ? ' selected' : '' }}>Favourite</option>
                            <option value="0" {{ $todo->is_favourite == '0' ? ' selected' : '' }}>Not</option>
                        </select>
                        @error('is_favourite')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">( Optional )</span></label>
                        <textarea type="text" name="description" class="form-control " id="description">{{ $todo->description }}</textarea>
                        @error('description')
                            <span class="text-danger d-block mt-1">{{ $message }}</span></label>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="submit-btn">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection
