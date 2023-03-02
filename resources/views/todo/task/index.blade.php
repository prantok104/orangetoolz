<!-- ============================================================== -->
<!-- Extends master layouts -->
<!-- ============================================================== -->
@extends('layouts.master')
@section('title', 'All Tasks')

@php
    $priority = [
        '1' => ['text-danger', 'High'],
        '2' => ['text-warning', 'Medium'],
        '3' => ['text-primary', 'Low'],
    ];
    
    $status = [
        '1' => ['text-muted', 'Active'],
        '2' => ['text-primary', 'Processing'],
        '3' => ['text-danger', 'Done'],
        '4' => ['text-warning', 'Checking'],
        '5' => ['text-success', 'Completed'],
    ];
@endphp
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
                    Tasks</span></p>
            <h3>All Tasks ({{ $tasks->total() }}) by {{ $todo->name }}</h3>
        </div>
        <div class="orange-breadcrumb-right">
            <a href="{{ route('task.create', ['todo_id' => encrypt($todo->id)]) }}"><i class="fa-solid fa-plus"></i> Add new
                task</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Breadcrumb area end -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Category content area start -->
    <!-- ============================================================== -->
    <div class="orange-category-content">
        @forelse ($tasks as $key=>$task)
            <div class="orange-category-single-content green">
                <div class="orange-category-data">
                    <div class="category-title">
                        <h5><span class="mr-2">{{ $tasks->perPage() * ($tasks->currentPage() - 1) + ++$key }})</span>
                            {{ $task->name }}</h5>
                        <span class="time">- {{ $task->updated_at->diffForHumans() }}</span>
                        <span class="time {{ $priority[$task->priority][0] }}">- {{ $priority[$task->priority][1] }}</span>
                    </div>
                    <div class="category-content">
                        <div class="category-tags mt-2">
                            <div class="orange-tags">
                                <span class="ml-4 {{ $status[$task->status][0] }}">{{ $status[$task->status][1] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ornage-category-action">
                    <a href="{{ route('task.edit', [encrypt($task->id), 'todo_id' => encrypt($todo->id)]) }}"
                        title="EDIT"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                    <a href="javascript:void(0)" title="DELETE" onclick="return deleteItem({{ $task->id }})"><i
                            class="fa-solid fa-trash text-danger"></i></a>
                </div>
            </div>
        @empty
            <div class="orange-category-single-content">
                <div class="orange-category-data">
                    <div class="category-title m-0">
                        <h4 class="text-danger">No task found!</h4>
                    </div>

                </div>
            </div>
        @endforelse

        <div class="pagination d-flex justify-content-right w-100">
            {{ $tasks->links() }}
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
                        url: "{{ route('task.destroy', '') }}" + "/" + id,
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
