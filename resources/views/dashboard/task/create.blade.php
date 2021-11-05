@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Create New Task
@endsection

@section('content')

    <div class="card shadow mb-4 bg-gray-90">
        <div class="card-body">
            <form action="{{ route('task.store') }}" method="POST" class="form-group pt-4">
                @csrf
                <div class="pb-3 mb-3 mb-sm-0">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="form-control form-control-user"
                        placeholder="Project Name" name="project_name" value="{{ $project->project_name }}" disabled>
                </div>

                <div class="pb-3 mb-3 mb-sm-0">
                    <label for="task">Task</label>
                    <input type="text" class="form-control form-control-user"
                        placeholder="Task" name="task" autofocus>
                </div>

                <div class="pb-3 mb-3 mb-sm-0">
                    <label for="estimated_time">Estimated time in hours</label>
                    <input type="number" min="1" class="form-control form-control-user"
                        placeholder="Estimated time in hours" name="estimated_time" onkeypress="return event,charCode != 45 ">
                </div>

                @if (count($status) > 0)
                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="status">Status</label>
                        <select class="form-control form-select-lg" aria-label="form-select-lg" name="status_id">
                            <option value="{{ $status[0]['id'] }}" selected>{{ $status[0]['status'] }}</option>
                            <option value="{{ $status[1]['id'] }}">{{ $status[1]['status'] }}</option>
                            <option value="{{ $status[2]['id'] }}">{{ $status[2]['status'] }}</option>
                        </select>

                    </div>

                @endif

                <div class="pb-3">
                    <input type="hidden" class="form-control form-control-user" placeholder="Amount Charged in dollars" name="project_id" value="{{ $project->id }}">
                </div>

                <button type="submit" class="btn btn-success btn-user">
                    Add Task
                </button>
            </form>
        </div>
    </div>

@endsection
