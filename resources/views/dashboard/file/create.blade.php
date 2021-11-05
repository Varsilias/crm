@extends('dashboard.layout.skeleton')

@section('page-title')
    Add New File
@endsection

@section('content')
<div class="card shadow mb-4 bg-gray-90 pt-4">
        <div class="card-body">

            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" class="user">
                @csrf

                @if (count($projects) > 0)
                    <div class="pb-3 mb-3 mb-sm-0">
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="project_id">
                            <option>Select a Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                        </select>
                            <span class="help-block text-danger">{{$errors->first('project_id')}}</span>
                    </div>


                @else
                    <div class="pb-3 mb-3 mb-sm-0">
                        <h3>You have no Project(s)</h3>
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="project_id" disabled>
                            <option selected>No Project found</option>
                        </select>
                        <small><a href="{{ route('project.create') }}">Proceed to add new Project</a></small>
                    </div>
                @endif

                
                <hr>
                <button type="submit" class="btn btn-dark">
                    Upload
                </button>
            </form>
        </div>
    </div>
@endsection

@section('page-level-script')
{{-- <script src="{{ asset('dist/filepond.min.js') }}"></script> --}}
  <script>

  </script>
@endsection
