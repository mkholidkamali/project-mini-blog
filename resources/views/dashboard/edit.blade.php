
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h1>Update Post - {{ $post->title }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.update', $post->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch') 
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-select">
                            @foreach ($categories as $category)
                                @if (old('category_id', $post->category_id) == $category->id)
                                    <option value="{{ $post->category_id }}" selected>{{ $post->category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image @error('image') is-invalid @enderror">Image</label>
                        <input type="hidden" name="oldImage" value="{{ $post->image }}">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview mb-2 d-block" height="150px" width="200px" style="object-fit: cover; border-radius:1vh">
                        @else
                            <img src="" class="img-preview mb-2 d-block" height="150" width="200" style="object-fit: cover; border-radius:1vh">
                        @endif
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="hidden" name="description" id="description" value="{{ old('description', $post->description) }}">
                        <trix-editor input="description"></trix-editor>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary float-end">
                        UPDATE
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFRevent) {
                imgPreview.src = oFRevent.target.result;
            }
        }
    </script>
@endsection