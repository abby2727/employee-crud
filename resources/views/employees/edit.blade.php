@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Update Employee
                        <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-employee/' . $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $employee->name }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" value="{{ $employee->phone }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{ $employee->designation }}"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="2" {{ $employee->status == 2 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>
                                    Retired
                                </option>
                                <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>
                                    Others
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
