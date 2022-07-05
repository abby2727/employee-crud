@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                @if (session('del_status'))
                    <h6 class="alert alert-danger">{{ session('del_status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Post CRUD using Resource Controller
                            <a href="{{ url('posts/create') }}" class="btn btn-primary float-end">Add Post</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

                                        <!-- displaying image into the website (READ) -->
                                        <td>
                                            <img src="{{ asset('uploads/posts/' . $item->image) }}" width="100px"
                                                height="100px" alt="">
                                        </td>

                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                Visible
                                            @else
                                                Hidden
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('posts/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ url('posts/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
