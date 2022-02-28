@extends('layouts.app')

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
                    <h2>{{ $post->author }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection