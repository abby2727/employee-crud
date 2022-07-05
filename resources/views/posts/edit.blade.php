@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Post
                            <a href="{{ url('posts') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('posts/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{ $post->description }}"
                                    class="form-control" required>
                            </div>
                            <!-- File Upload -->
                            <div class="form-group mb-3">
                                <!-- <label for="">Image</label> -->
                                <input type="file" name="image" class="form-control" required>
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" width="100px" height="100px"
                                    alt="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $post->status == 1 ? 'checked' : '' }}>
                                Unactive/Active
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" value="Update Post" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
