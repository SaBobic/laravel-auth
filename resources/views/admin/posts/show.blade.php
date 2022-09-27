@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            {{ $post->slug }}
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <div>
            <strong>Pubblicato il</strong> {{ $post->created_at }}
        </div>
        <div>
            <strong>Aggiornato il</strong> {{ $post->updated_at }}
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Return</a>
            <a class="btn btn-success" href="">Edit</a>
            <a class="btn btn-danger" href="">Delete</a>
        </div>
    </div>
</div>
@endsection