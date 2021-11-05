@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Create New Project
@endsection

@section('content')

    <div class="card shadow mb-4 bg-gray-90">
        <div class="card-body">
            <form action="{{ route('project.store') }}" method="POST" class="form-group pt-4">
                @csrf
                <div class="pb-3 mb-3 mb-sm-0">
                    <label for="project_name" class="text-dark" style="font-weight: bold;">Project Name</label>
                    <input type="text" class="form-control form-control-user"
                        placeholder="Project Name" name="project_name" autofocus>
                </div>

                <div class="pb-3 mb-3 mb-sm-0">
                    <label for="project_description" class="text-dark" style="font-weight: bold;">Summary or Description of Project</label>
                    <textarea placeholder="Summary or Description of Project" class="form-control" rows="5" cols="50"
                         name="project_description">
                    </textarea>
                </div>

                @if (count($clients) > 0)
                    <div class="pb-3 mb-3 mb-sm-0">
                        <label for="client_id" class="text-dark" style="font-weight: bold;">Client you are handling this project for</label>
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="client_id">
                            {{-- <option selected>Select from existing clients</option> --}}
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                        @endforeach
                        </select>

                    </div>
                    

                @else
                    <div class="pb-3 mb-3 mb-sm-0">
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="client_id" disabled>
                            <option selected>You have no clients to select from</option>                                
                        </select>

                    </div>
                @endif
                

                <div class="pb-3">
                    <label for="project_type" class="text-dark" style="font-weight: bold;">Type of Project</label>
                    <select class="form-control form-select-lg" aria-label=".form-select-lg" name="project_type">
                        <option value="Web">Web</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Desktop">Desktop</option>
                        <option value="Content Writing">Content Writing</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Ghost Writing">Ghost Writing</option>
                        <option value="Business Development">Business Development</option>

                    </select>
                </div>

                <div class="pb-3">
                    <label for="amount_charged" class="text-dark" style="font-weight: bold;">Amount charged</label>
                    <input type="text" class="form-control form-control-user" placeholder="Amount charged in dollars" name="amount_charged">
                </div>

                <div class="pb-3">
                    <label for="due_date" class="text-dark" style="font-weight: bold;">Due date</label>
                    <input type="date" class="form-control form-control-user" placeholder="Due date" name="due_date">
                </div>

                <div class="pb-3">
                    <input type="hidden" class="form-control form-control-user" placeholder="Amount Charged in dollars" name="user_id" value="{{ Auth::user()->id }}">
                </div>

                @if (count($clients) > 0)
                    <button type="submit" class="btn btn-success btn-user">
                        Add Project
                    </button>

                @else
                    <button type="submit" class="btn btn-success btn-user" disabled>
                        Add Project
                    </button>
                    <div>
                        <small>Every project you add has to be owned by one of your pre-existing clients. Add a <a href="{{ route('client.create') }}" class="text-link"> client</a> before you can successfully add a project</small>
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection
