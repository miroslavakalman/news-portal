<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function welcome()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }
    public function search(Request $request)
    {
        // Получаем тег из запроса
        $tag = $request->input('tag');

        // Находим все посты, у которых есть данный тег
        $posts = Post::where('tags', 'like', "%$tag%")->get();

        // Возвращаем представление с результатами поиска
        return view('search_results', compact('posts', 'tag'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|unique:posts|max:255',
        'category' => 'required|string|max:255',
        'content' => 'required|string',
        'tags' => 'nullable|string',
        'image' => 'required|string', // Теперь image не является файлом, а строкой с путем к изображению
    ]);

    // Создаем пост
    Post::create([
        'title' => $request->title,
        'category' => $request->category,
        'content' => $request->content,
        'tags' => $request->tags,
        'image' => $request->image, // Сохраняем путь к изображению
    ]);

    return redirect()->route('admin.posts.index')->with('success', 'Пост успешно создан.');
}

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        $post->update([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'tags' => $request->tags,
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($post->image);
            $imagePath = $request->file('image')->store('post_images');
            $post->image = $imagePath;
            $post->save();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно обновлен.');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно удалён.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
    public function see(Post $post)
{
    return view('posts.show', compact('post'));
}

}
