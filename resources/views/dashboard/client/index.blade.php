@extends('dashboard.layout.skeleton')

<!--Page Title-->

@section('page-title')
    Clients
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="px-3 pb-0 pt-3">
            <a href="{{ route('client.create') }}" class="m-0 text-white btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Create Client</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Amount Charged</th>
                            <th>VAT</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    @if (count($clients) > 0)
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->company_name }}</td>
                                    <td>{{ $client->company_address }}</td>
                                    <td>{{ $client->company_email }}</td>
                                    <td>{{ $client->company_location }}</td>
                                    <td>{{ $client->amount_charged }}</td>
                                    <td>{{ $client->amount_charged * 15/100 }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('client.edit', $client->id) }}">
                                            <i class="fas fa-edit fa-2x"></i>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('client.delete', $client->id) }}" method="POST">
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
                    <h4>No client(s) found</h4>
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
