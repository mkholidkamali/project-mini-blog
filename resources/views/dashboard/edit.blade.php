
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h1>Update Post - Title</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-select">
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary float-end">
                        CREATE
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection