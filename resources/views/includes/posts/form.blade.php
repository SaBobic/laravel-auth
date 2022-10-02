@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

@if ($post->exists)
<form action="{{ route('admin.posts.update', $post) }}" method="POST" novalidate>
    @method('PUT')
@else
<form action="{{ route('admin.posts.store') }}" method="POST" novalidate>
@endif

    @csrf

    <div class="form-row">
        <div class="form-group col-md-9">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group col-md-3">
            <label for="category">Categoria</label>
            <select class="form-control" id="category" name="category_id">
                <option value="">Scegli una categoria</option>
                @foreach ($categories as $category)    
                    <option
                    @if (old('category_id', $post->category_id) == $category['id']) selected @endif
                    value="{{ $category['id'] }}">
                        {{ $category['label'] }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="mb-1">Tag</div>
        @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                <input
                    @if (in_array($tag->id, old('tags', $current_tags_ids ?? []))) checked @endif
                    class="form-check-input"
                    name="tags[]"
                    type="checkbox"
                    id="tag-{{ $tag->label }}"
                    value="{{ $tag->id }}"
                    >
                <label class="form-check-label" for="tag-{{ $tag->label }}">{{ $tag->label }}</label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="image">URL immagine</label>
        <input type="url" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
    </div>

    <div class="form-group">
        <label for="content">Contenuto</label>
        <textarea type="text" rows="5" class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="publish" name="publish">
            <label class="form-check-label" for="publish">Pubblica</label>
        </div>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Ritorna all'indice</a>
    <button type="submit" class="btn btn-success">{{ $post->exists ? 'Modifica post' : 'Crea post' }}</button>
</form>