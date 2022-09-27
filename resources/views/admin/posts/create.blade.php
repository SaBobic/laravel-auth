@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>

        <div class="form-group">
        <label for="image">Image URL</label>
        <input type="url" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" rows="5" class="form-control" id="content" name="content"></textarea>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="publish" name="publish">
                <label class="form-check-label" for="publish">Publish</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Create post</button>
    </form>
</div>

@endsection