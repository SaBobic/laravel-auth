@extends('layouts.app')

@section('extra-js')
    <script src="{{ asset('js/delete_confirm.js') }}" defer></script>
@endsection

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
        <div class="mb-3">
            <strong>Aggiornato il</strong> {{ $post->updated_at }}
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Return</a>
            <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
            <form class="d-inline-block delete-form" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" href="">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection