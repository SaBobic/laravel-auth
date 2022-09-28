<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $post = new Post;
        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'unique:posts|required|string',
            'content' => 'required|string',
            'image' => 'nullable|url',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'title.required' => 'Il campo Titolo non può essere vuoto',
            'title.unique' => 'Esiste già un post con questo titolo',
            'content.required' => 'Il campo Contenuto non può essere vuoto',
            'image.url' => 'URL invalido',
            'category_id.exists' => 'La categoria selezionata non esiste',
        ]);

        $data = $request->all();
        $new_post = new Post();
        $new_post->slug = Str::slug($data['title'], '-');
        $new_post->fill($data);
        $new_post->save();
        return redirect()->route('admin.posts.index')->with('message', 'Il post è stato creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required|string',
            'image' => 'nullable|url',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'title.required' => 'Il campo Titolo non può essere vuoto',
            'title.unique' => 'Esiste già un post con questo titolo',
            'content.required' => 'Il campo Contenuto non può essere vuoto',
            'image.url' => 'URL invalido',
            'category_id.exists' => 'La categoria selezionata non esiste',
        ]);

        $data = $request->all();
        $post->slug = Str::slug($data['title'], '-');
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', 'Il post è stato aggiornato con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Il post è stato eliminato con successo')->with('type', 'danger');
    }
}
