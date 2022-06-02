
@extends('layouts.frontend')

@section('main')
<div class="album py-5 bg-light">
    <div class="container">

        <h1 class="text-center mb-5">{{ $category }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                @foreach ($posts as $post)
                    <div class="card shadow-sm">
                        <a href="{{ route('public.show', $post->slug) }}">
                            <img src="https://picsum.photos/500" height="225" style="object-fit: cover;" class="w-100">
                        </a>

                        <div class="card-body">
                            <p class="card-text">
                                {{ $post->title }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3">
                                <small>
                                    {{ $post->user->name }} - {{ $post->category->name }}
                                </small>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
</div>
@endsection