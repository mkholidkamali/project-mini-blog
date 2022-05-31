
@extends('layouts.frontend')

@section('main')
    <div class="container">
        <a href="{{ route('public.index') }}" class="btn btn-success position-absolute mt-5 d-flex align-items-center">
            <i class="bi bi-box-arrow-left fs-5"></i> &nbsp; Back
        </a>
    </div>
    <div class="container mx-auto text-center py-5">
        <h1>Title</h1>
        <small>09 Juni 2022 - Author <a href="#">Git</a></small>
        <img src="https://picsum.photos/500" class="w-100" height="500px" style="object-fit: cover; border-radius:1vh">
        <p class="pt-4">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos officiis eaque accusamus laudantium ex minima vero aliquam in ipsum quidem praesentium rem, sapiente excepturi asperiores reprehenderit aliquid doloribus ad. Voluptate!
        </p>
    </div>
@endsection