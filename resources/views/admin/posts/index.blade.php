@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
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
                            <div class="btn btn-primary">View</div>
                            <div class="btn btn-success">Edit</div>
                            <div class="btn btn-danger">Delete</div>
                        </td>
                    </tr>
                @empty
                        <h2>Non ci sono post da visualizzare!</h2>
                @endforelse
        </tbody>
    </table>        
</div>
@endsection