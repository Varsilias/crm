@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Dashboard
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card bg-light text-dark shadow">
                <div class="card-body">
                    Welcome
                    <div class="text-gray-50 small">
                        {{ $user->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <div class="row">

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Users</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/undraw_Followers.svg') }}" alt="...">
                    </div>
                    <p>
                        See a list of other users of the CRM Software that might interest you and follow them only if you want to. 
                    </p>
                    <a href="#">Proceed to see other Users &rarr; <em>Coming Soon!</em></a>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Clients</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>
                        Create and manage new and existing Clients and information related to them right from the comfort of your CRM dashboard!
                    </p>
                    <a href="{{ route('client.index') }}">Proceed to create new Client &rarr;</a>
                </div>
            </div>

        </div>

    </div><!--End of Row-->

        <div class="row">

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Projects</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/undraw_Organizing_projects_0p9a.svg') }}" alt="...">
                    </div>
                    <p>
                        Create and manage new and existing projects being executed for Clients, its start date and due date!
                    </p>
                    <a href="{{ route('project.index') }}">Proceed to create new Project &rarr;</a>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tasks</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/undraw_Project_completed_re_pqqq.svg') }}" alt="...">
                    </div>
                    <p>
                        Create and manage tasks, attach each tasks to a specific project and mark it as complete when done
                    </p>
                    <a rel="nofollow" href="{{ route('project.index') }}">Proceed to create new a <strong>project</strong> and start adding <strong>tasks</strong> for it &rarr;</a>
                </div>
            </div>

        </div>

    </div><!--End of Row-->


@endsection
