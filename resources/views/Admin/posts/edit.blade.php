@extends('layouts.app')

@section('documentTitle')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Modify {{ $post->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card w-50 d-flex align-items-center">
                    <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
                        {{-- essenziali per il funzionamento del form --}}
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
    
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">author</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}">
    
                            @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}">
    
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="btn btn-primary" type="submit" value="Salva">

                        <div class="col">
                            <a class="btn btn-dark" href="{{ url()->previous() }}">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection