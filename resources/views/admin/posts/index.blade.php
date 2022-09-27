@extends('layouts.app')

@section('extra-js')
    <script src="{{ asset('js/delete_confirm.js') }}" defer></script>
@endsection

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($posts as $post)    
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">View</a>
                            <a class="btn btn-success" href="">Edit</a>
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