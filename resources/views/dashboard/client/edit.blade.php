@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Edit Client Info
@endsection

@section('content')


    <div class="card shadow mb-4 bg-gray-90">
        <div class="card-body">

                <form action="{{ route('client.update', $clientele->id) }}" method="POST" class="form-group pt-4">
                    @method('PUT')
                    @csrf
                    <div class="pb-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"
                            placeholder="Company Name" name="company_name" value="{{ $clientele->company_name }}">
                    </div>

                    <div class="pb-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"
                            placeholder="Address" name="company_address" value="{{ $clientele->company_address }}">
                    </div>

                    <div class="pb-3">
                        <input type="email" class="form-control form-control-user"
                            placeholder="Company Email" name="company_email" value="{{ $clientele->company_email }}">
                    </div>

                    <div class="pb-3 mb-3 mb-sm-0">
                        <select class="form-control form-select-lg" aria-label=".form-select-lg" name="company_location" disabled>
                            <option selected>{{ $clientele->company_location }}</option>
                            <option value="USA">United States of America</option>
                            <option value="China">China</option>
                            <option value="Germany">Germany</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Australia">Australia</option>
                            <option value="Brazil">Brazil</option>
                        </select>

                    </div>

                    <div class="pb-3">
                        <input type="text" class="form-control form-control-user" placeholder="Amount Charged in dollars" name="amount_charged" value="{{ $clientele->amount_charged }}">
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
