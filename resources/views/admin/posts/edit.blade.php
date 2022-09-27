@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $post->title }}">
            </div>
        </div>

        <div class="form-group">
        <label for="image">Image URL</label>
        <input type="url" class="form-control" id="image" name="image" value="{{ old('image') ?? $post->image }}">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" rows="5" class="form-control" id="content" name="content">{{ old('contect') ?? $post->content }}"</textarea>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="publish" name="publish">
                <label class="form-check-label" for="publish">Publish</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Edit post</button>
    </form>
</div>

@endsection