@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="h1">Admin - All Posts</h1>
        </div>
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary m-3">Add new post</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author }}</td>
                            <td>{{ $post->content }}</td>
                            <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post)}}">View Post</a>
                                @if (Auth::user()->id === $post->user_id)
                                    <a href="{{ route('admin.posts.edit', $post->slug) }}"
                                    class="btn btn-info">Edit</a>
                                @endif
                                @if (Auth::user()->id === $post->user_id)
                                    <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                @endif
                                {{-- nel caso volessi fare prima un check con js --}}
                                {{-- <button class="delete">Delete</button> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection

