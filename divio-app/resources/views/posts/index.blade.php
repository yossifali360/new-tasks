@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ url('posts/create') }}" class="btn btn-primary my-3">Add New Post</a>
        <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
    <div class="col-12">
        @if (session()->get('success') != null)
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ ucwords($post->user->name) }}</td>
                        <td>
                            <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('posts/' . $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
