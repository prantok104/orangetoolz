<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'All Items')


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
                    Items</span></p>
            <h3>All Items ({{ $todos->total() }})</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('todo.create') }}"><i class="fa-solid fa-plus"></i> Add new item</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        @forelse ($todos as $key=>$todo)
            <div class="orange-category-single-content green">
                <div class="orange-category-data">
                    <div class="category-title">
                        <h5><span class="mr-2">{{ $todos->perPage() * ($todos->currentPage() - 1) + ++$key }})</span>
                            {{ $todo->name }}</h5>
                        <span class="time">- {{ $todo->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="category-content">
                        <p>{{ $todo->description }}</p>
                        <div class="category-tags mt-2">
                            <div class="orange-cat">
                                <span class="category">{{ @$todo->categories->name }}</span>
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
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection


{{-- Category delete js --}}
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
                        url: "{{ route('todo.destroy', '') }}" + "/" + id,
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
