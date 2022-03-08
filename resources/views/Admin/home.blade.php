@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/front.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} - {{ Auth::user()->name }} - {{ Auth::user()->userInfo()->first()->address }}

                    <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">View Posts</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
