@extends('dashboard.layout.skeleton')


<!--Page Title-->
@section('page-title')
    Profile
@endsection

@section('content')


    <div class="card shadow mb-4 bg-gray-90 pt-4">
        <div class="card-body">

            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="user">
                @method('PUT')
                @csrf

                <div class="row justify-content-center">
                    <div class="col-md-12 pb-4 mx-auto d-block rounded-circle">
                        @if ($user->avatar == null)
                            <img src="{{ asset('img/undraw_profile.svg') }}" alt="profile_picture" height="400" width="300" class="img-fluid mx-auto d-block rounded-circle">

                        @elseif ($user->g_id || $user->fb_id)
                            <img src="{{ $user->avatar }}" alt="profile_picture" height="400" width="300" class="img-fluid mx-auto d-block rounded-circle">
                        @else
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="profile_picture" height="400" width="300" class="img-fluid mx-auto d-block rounded-circle">
                        @endif
                    </div>

                    <div class="col-md-4 pb-4 mx-auto d-block">
                        <input type="file" name="avatar" id="avatar">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-user" name="name"
                            placeholder="Fullname" value="{{ $user->name ?? '' }}">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="linkedin_profile_linl">LinkedIn Profile Link</label>
                        <input type="text" class="form-control form-control-user" name="linkedin_profile_link"
                            placeholder="LinkedIn Profile Link" value="{{ $user->linkedin_profile_link ?? ''}}">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-user" name="username"
                            placeholder="Username" value="{{ $user->username ?? '' }}">
                    </div>

                    <div class="col-sm-6">
                        <label for="twitter_profile_link">Twitter Profile Link</label>
                        <input type="text" class="form-control form-control-user" name="twitter_profile_link"
                            placeholder="Twitter Profile Link" value="{{ $user->twitter_profile_link ?? '' }}">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control form-control-user" name="email"
                            placeholder="Email" value="{{ $user->email ?? '' }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="recovery_email">Recovery Email</label>
                        @if ($user->recovery_email === null)
                            <input type="email" class="form-control form-control-user"
                            name="recovery_email" placeholder="Recovery Email">

                        @else
                            <input type="email" class="form-control form-control-user"
                            name="recovery_email" placeholder="Recovery Email" value="{{ $user->recovery_email }}" disabled>
                        @endif

                    </div>
                </div>
                    <hr>
                <button type="submit" class="btn btn-dark">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection

@section('page-level-script')
  <script src="{{ asset('dist/filepond.min.js') }}"></script>
  <script>
      const myInput = document.querySelector('input[id="avatar"]');
      const pond = FilePond.create( myInput );

      FilePond.setOptions({
        server: {
            url: '/profile/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
      })

  </script>
@endsection





























{{-- <div class="form-group">
    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
        placeholder="Email Address">
</div> --}}
