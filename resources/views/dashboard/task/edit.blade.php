@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Edit Task
@endsection

@section('content')


    <div class="card shadow mb-4 bg-gray-90">
        <div class="card-body">

                <form action="{{ route('task.update', $task->id) }}" method="POST" class="form-group pt-4">
                    @method('PUT')
                    @csrf
                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control form-control-user"
                            placeholder="Project Name" name="project_name" value="{{ $task->project->project_name }}" disabled>
                    </div>

                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="task">Task</label>
                        <input type="text" class="form-control form-control-user"
                            placeholder="Task" name="task" value="{{ $task->task }}" >
                    </div>


                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="extimated_hour">Estimated time in hours</label>
                        <input type="number" min="1" class="form-control form-control-user"
                            placeholder="Estimated time in hour" name="estimated_time" value="{{ $task->estimated_time }}" onkeypress="return event,charCode != 45 ">

                    </div>

                    <div class="pb-3">
                        <label for="status">Status</label>
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="status_id">
                            <option value="{{ $task->status->id }}" selected>{{ $task->status->status }}</option>

                            @foreach ($status as $item)
                                <option value="{{ $item->id }}">{{ $item->status }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="pb-3">
                        <input type="hidden" class="form-control form-control-user" name="project_id" value="{{ $task->project->id }}">
                    </div>

                    <button type="submit" class="btn btn-success btn-user">
                        Update
                    </button>
                </form>

        </div>
    </div>

@endsection
