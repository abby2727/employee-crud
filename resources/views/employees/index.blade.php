@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('del_status'))
        <div class="alert alert-danger">
            {{ session('del_status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>
                List of Employees
                <a href="{{ url('add-employee') }}" class="btn btn-primary float-end">Add Employee</a>
            </h4>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employee as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>
                                @if ($item->status == '2')
                                    <h6>Active</h6>
                                @endif
                                @if ($item->status == '1')
                                    <h6>Retired</h6>
                                @endif
                                @if ($item->status == '0')
                                    <h6>Others</h6>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit-employee/' . $item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('delete-employee/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                <!-- <a href="#" class="btn btn-danger">Delete</a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
