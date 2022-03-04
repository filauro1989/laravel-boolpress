@extends('layouts.admin')

@section('documentTitle')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card w-50 d-flex align-items-center">
                    <div class="h1">{{ $post->title }}</div>
                    <p class="text-center">{{ $post->content }}</p>
                    <h2>Author: {{ $post->user()->first()->name }}</h2>
                    <h2>Category: {{ $post->category()->first()->name }}</h2>
                    <h3>Tags: 
                        @foreach ($post->tags()->get() as $tag)
                        {{ $tag->name }}
                        @endforeach 
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center mt-3">
                <a class="btn btn-dark" href="{{ route('admin.posts.index') }}">Back</a>
            </div>
        </div>
    </div>
@endsection