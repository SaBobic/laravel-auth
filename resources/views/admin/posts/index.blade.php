@extends('layouts.app')

@section('extra-js')
    <script src="{{ asset('js/delete_confirm.js') }}" defer></script>
@endsection

@section('content')

<div class="container">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Aggiungi nuovo articolo</a> 
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tag</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($posts as $post)    
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->user)
                                {{ $post->user->userDetail->getFullName() }}
                            @else
                                Anonimo
                            @endif
                        </td>
                        <td>
                            @if ($post->category)
                                <span class="badge badge-{{ $post->category->color }}">{{ $post->category->label }}</span>
                            @else
                                Nessuna
                            @endif
                        </td>
                        <td>
                            @if ($post->tags)
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-{{ $tag->color }}">{{ $tag->label }}</span>
                                @endforeach
                            @else
                                Nessuno
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">Guarda</a>
                            @if ($post->user_id === Auth::id())
                                <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">Modifica</a>
                                <form class="d-inline-block delete-form" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" href="">Elimina</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <h2>Non ci sono articoli da visualizzare!</h2>
                        </td>    
                    </tr>
                @endforelse
        </tbody>
    </table>
    <div class="row gy-3">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-3">
                    <li class="list-group-item h-100">
                        {{ $category->label }}
                        <span class="badge badge-{{ $category->color }} badge-pill">{{ count($category->posts->pluck('id')->toArray()) }}</span>
                        <div>
                            <ul>
                                @foreach ($category->posts as $post)
                                    <li><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </div>
        @endforeach
    </div>
</div>
@endsection