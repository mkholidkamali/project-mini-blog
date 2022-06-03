
@extends('layouts.frontend')

@section('main')
    <div class="container">
        <a href="{{ route('public.index') }}" class="btn btn-success position-absolute mt-5 d-flex align-items-center">
            <i class="bi bi-box-arrow-left fs-5"></i> &nbsp; Back
        </a>
    </div>
    <div class="container mx-auto text-center py-5">
        <h1>{{ $post->title }}</h1>
        <small>{{ $post->created_at->format('d M Y') }} - {{ $post->user->name }} <a href="{{ route('public.category.show', $post->category->name) }}">{{ $post->category->name }}</a></small>
        <img src="{{ asset('storage/' . $post->image) }}" class="w-100" height="500px" style="object-fit: cover; border-radius:1vh">
        <p class="pt-4">
            {!! $post->description !!}
        </p>
    </div>
@endsection