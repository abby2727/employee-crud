@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{-- @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Employee
                        <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('store-employee') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="2">Active</option>
                                <option value="1">Retired</option>
                                <option value="0">Others</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
