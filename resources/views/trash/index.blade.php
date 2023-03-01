<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'Trash')


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
                    Trash</span></p>
            <h3>All Trash ({{ $trashes->total() }})</h3>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        @forelse (@$trashes as $key=>$trash)
            <div class="orange-category-single-content green }}">
                <div class="orange-category-data">
                    <div class="category-title">
                        <h5><span class="mr-2">{{ $trashes->perPage() * ($trashes->currentPage() - 1) + ++$key }})</span>
                            {{ @$trash->services()[0]->name }}</h5>
                        <span class="time">- {{ @$trash->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="category-content">
                        <p>{{ $trash->label }}</p>
                    </div>
                </div>
                <div class="ornage-category-action">
                    <a href="javascript:void(0)" title="Restore" class="orange-restore-btn" data-id="{{ $trash->id }}"><i
                            class="fa-solid fa-rotate-right text-primary"></i></a>
                    <a href="javascript:void(0)" title="DELETE" class="orange-delete-btn" data-id="{{ $trash->id }}"><i
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
            {{ $trashes->links() }}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Category content area end -->
    <!-- ============================================================== -->
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            // Item restore method
            $(document).on('click', '.orange-restore-btn', function() {
                var id = $(this).data('id');
                new swal({
                    title: 'Are you sure?',
                    text: 'You will restore the item',
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
                }).then((willRestore) => {
                    if (willRestore) {
                        $.ajax({
                            url: "{{ route('trash.restore', '') }}",
                            method: "POST",
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                new swal("Success!", "This item has been restored",
                                    "success");
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                new swal("Error!",
                                    "An error occurred while restore the trash item",
                                    "error");
                            }
                        });
                    }
                });
            });


            // Item delete method
            $(document).on('click', '.orange-delete-btn', function() {
                var id = $(this).data('id');
                new swal({
                    title: 'Are you sure?',
                    text: 'Once delete, You will not be able to recover',
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
                            url: "{{ route('trash.destroy', '') }}" + "/" + id,
                            method: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                new swal("Success!", "This item has been deleted",
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
            });
        });
    </script>
@endpush
