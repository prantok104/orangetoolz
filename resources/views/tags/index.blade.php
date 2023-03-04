<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Tags')


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
                    Tags</span></p>
            <h3>All Tags ({{ $tags->total() }})</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('tags.create') }}"><i class="fa-solid fa-plus"></i> Add new tags</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- tag content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        <div class="orange-tags-content">
            @forelse ($tags as $key=>$tag)
                <div class="orange-category-single-content {{ $tag->status == 1 ? 'green' : 'red' }}">
                    <div class="orange-category-data">
                        <div class="category-title tag-title mb-0">
                            <h5><span class="mr-2">{{ $tags->perPage() * ($tags->currentPage() - 1) + ++$key }})</span>
                                {{ $tag->name }}</h5>
                            <span class="time">- {{ $tag->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="ornage-category-action">
                        <a href="{{ route('tags.edit', encrypt($tag->id)) }}" title="EDIT"><i
                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                        <a href="javascript:void(0)" title="DELETE" onclick="return deleteItem({{ $tag->id }})"><i
                                class="fa-solid fa-trash text-danger"></i></a>
                    </div>
                </div>
            @empty
                <div class="orange-category-single-content">
                    <div class="orange-category-data">
                        <div class="category-title m-0">
                            <h4 class="text-danger">No tag found!</h4>
                        </div>

                    </div>
                </div>
            @endforelse
        </div>

        <div class="pagination d-flex justify-content-right w-100">
            {{ $tags->links() }}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- tag content area end -->
    <!-- ============================================================== -->
@endsection



{{-- Tags delete js --}}
@push('js')
    <script>
        function deleteItem(id) {
            new swal({
                title: 'Are you sure?',
                text: 'Once delete, You will be able to recover from trash',
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: "Confirm",
                        value: true,
                        visible: true,
                        closeModel: true
                    },
                    cancel: {
                        text: "Cancel",
                        value: false,
                        visible: true,
                        closeModel: true
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('tags.destroy', '') }}" + "/" + id,
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            new swal("Success",
                                "This item has been deleted.",
                                "success");
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            new swal("Error!",
                                "An error occurred while deleting the trash item",
                                "error");
                        }
                    });
                }
            });
        }
    </script>
@endpush
