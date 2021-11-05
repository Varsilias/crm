@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Edit Project
@endsection

@section('content')


    <div class="card shadow mb-4 bg-gray-90">
        <div class="card-body">

                <form action="{{ route('project.update', $project->id) }}" method="POST" class="form-group pt-4">
                    @method('PUT')
                    @csrf
                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control form-control-user"
                            placeholder="Project Name" name="project_name" value="{{ $project->project_name }}">
                    </div>

                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="project_description">Summary or Description of Project</label>
                        <textarea placeholder="Summary or Description of Project" class="form-control" rows="5" cols="50" name="project_description">
                            {{ $project->project_description }}
                        </textarea>
                    </div>


                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="client">Client</label>
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="client_id" disabled>
                            <option selected value="{{ $project->client->id }}">{{ $project->client->company_name }}</option>
                        </select>

                    </div>

                    <div class="pb-3">
                        <label for="project_type">Project Catergory</label>
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="project_type">
                            <option selected>{{ $project->project_type }}</option>
                            <option value="Web">Web</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Desktop">Desktop</option>
                        </select>
                    </div>

                    <div class="pb-3">
                        <label for="amount_charged">Amount charged</label>
                        <input type="text" class="form-control form-control-user" placeholder="Amount Charged in dollars" name="amount_charged" value="{{ $project->amount_charged }}">
                    </div>

                    <div class="pb-3">
                        <label for="due_date">Due date</label>
                        <input type="date" class="form-control form-control-user" placeholder="Due date" name="due_date" value="{{ $project->due_date }}">
                    </div>

                    <div class="pb-3">
                        <input type="hidden" class="form-control form-control-user" placeholder="Amount Charged in dollars" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button type="submit" class="btn btn-success btn-user">
                        Update
                    </button>
                </form>

        </div>
    </div>

@endsection
