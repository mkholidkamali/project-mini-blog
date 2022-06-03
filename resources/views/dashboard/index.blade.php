
@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success text-center" role="alert">
                {!! session('message') !!}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between mb-1">
                    <h4 class="my-auto">Your Post</h4>
                    <a class="btn btn-success" href="{{ route('dashboard.create') }}">
                        Create
                    </a>
            </div>
            <div class="card-body">
                @forelse ($posts as $post)
                    <div class="d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <img src="{{ "storage/" . $post->image }}" width="150px" height="100px" style="object-fit: cover; border-radius:1vh">
                            <div class="my-auto ms-4 pt-3">
                                <h4>{{ $post->title }}</h4>
                                <p>{{ $post->created_at->format('d M Y') }} - {{ $post->category->name }}</p>
                            </div>
                        </div>
                        <div class="my-auto">
                            <a href="{{ route('dashboard.edit', $post->slug) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-square fs-3"></i>
                            </a>
                            <form action="{{ route('dashboard.destroy', $post->slug) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger fs-3" onclick="confirm('Delete This Post?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger text-center" role="alert">
                        Belum ada post
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection