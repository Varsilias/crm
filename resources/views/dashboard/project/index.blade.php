@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Projects
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="px-3 pb-0 pt-3">
            <a href="{{ route('project.create') }}" class="m-0 text-white btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Project</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (count($projects) > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Client</th>
                            {{-- <th>Category</th> --}}
                            <th>Amount Charged</th>
                            <th>Due Date</th>
                            <th>View Tasks</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->project_description }}</td>
                                    <td>{{ $project->client->company_name }}</td>
                                    {{-- <td>{{ $project->project_type }}</td> --}}
                                    <td>{{ formatDollarAmount($project->amount_charged) }}</td>
                                    <td>{{ formatDate($project->due_date) }}</td>

                                    <td>
                                        <a href="{{ route('task.index', $project->id) }}">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <i class="fas fa-tasks"></i>
                                                <span>Tasks</span>
                                            </div>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('project.edit', $project->id) }}">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                              <i class="fas fa-edit"></i>
                                               <span>Edit</span>
                                            </div>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('project.delete', $project->id) }}" method="POST">
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
                    <h6 class="text-gray-50"><em>You have no existing projects. Proceed to add a<a href="{{ route('project.create') }}" class="text-link"> new project</a></em></h6>                    
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
