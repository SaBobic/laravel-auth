@extends('layouts.app')

@section('extra-js')
    <script src="{{ asset('js/delete_confirm.js') }}" defer></script>
@endsection

@section('content')

<div class="container">
    <div class="text-right mb-3">
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Add new post</a> 
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Creato il</th>
                <th scope="col">Aggiornato il</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($posts as $post)    
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        @if ($post->category)
                            <td><span class="badge badge-{{ $post->category->color }}">{{ $post->category->label }}</span></td>
                        @else
                            <td>Nessuna</td>
                        @endif
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">View</a>
                            <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            <form class="d-inline-block delete-form" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" href="">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                        <h2>Non ci sono post da visualizzare!</h2>
                @endforelse
        </tbody>
    </table>
</div>
@endsection