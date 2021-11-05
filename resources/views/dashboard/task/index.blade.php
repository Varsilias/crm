@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    {{ $project->project_name }}
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="px-3 pb-0 pt-3">
            <a href="{{ route('task.create', $project->id) }}" class="m-0 text-white btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add New task</span>
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                @if (count($tasks) > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Estimated time in hours</th>
                            <th>Status</th>
                            <th>Edit Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ $task->estimated_time }}</td>
                                    <td>{{ $task->status->status }}</td>

                            @if ($task->status->status == 'Completed')
                                    <td class="text-center">
                                        <i class="fas fa-good fa-2x"></i>
                                    </td>

                            @else
                                    <td class="text-center">
                                        <a href="{{ route('task.edit', $task->id) }}">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                    </td>
                            @endif
                                    <td class="text-center">
                                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                    <h6 class="text-gray-50"><em>You have no existing todo for this project. Proceed to add a<a href="{{ route('task.create', $project->id) }}" class="text-link"> new todo</a></em></h6>                    
                    @endif

                </table>
            </div>
        </div>
    </div>
@endsection


@section('page-level-script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection
