
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="my-auto">Your Post</h4>
                    <a class="btn btn-success" href="{{ route('dashboard.create') }}">
                        Create
                    </a>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <div class="d-flex">
                        <img src="https://picsum.photos/500" width="150px" height="100px" style="object-fit: cover; border-radius:1vh">
                        <div class="my-auto ms-4 pt-3">
                            <h4>Title</h4>
                            <p>09 Januari 2022 - Git</p>
                        </div>
                    </div>
                    <div class="my-auto">
                        <a href="{{ route('dashboard.edit') }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square fs-3"></i>
                        </a>
                        <a href="{{ route('dashboard.destroy') }}" class="btn btn-danger fs-3">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection