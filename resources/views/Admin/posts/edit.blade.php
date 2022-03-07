@extends('layouts.admin')

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
                <div class="card w-50 d-flex align-items-center py-3">
                    <form action="{{ route('admin.posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                        {{-- essenziali per il funzionamento del form --}}
                        @csrf
                        @method('PATCH')

                        <legend>Categories</legend>
                        <select class="form-select" name="category_id">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option @if (old('category_id', $post->category_id) == $category->id) selected 
                                    @endif value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                            @error('category_id')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>

                        @if (!empty($post->image))
                            <div class="mb-3">
                                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{$post->title}}">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                        <fieldset class="my-3">
                            <legend>Tags</legend>
                            {{-- se abbiamo gia compilato il form e siamo tornati indietro per validazione errata allora facciamo un foreach e controlliamo old('tags') --}}
                            @if ($errors->any())
                                @foreach ($tags as $tag)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
                                @foreach ($tags as $tag)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                            {{ $post->tags()->get()->contains($tag->id) ? 'checked': '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </fieldset>

                        <div class="mb-3">
                            <legend>Title</legend>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
    
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <legend>Author</legend>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}">
    
                            @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <legend>Content</legend>
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