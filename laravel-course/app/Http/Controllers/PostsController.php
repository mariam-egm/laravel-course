<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use App\Http\Requests\Post\EditPostRequest;
use App\Http\Requests\Post\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::paginate(2),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' =>$post,
        ]);
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update(Post $post, EditPostRequest $request)
    {
        Post::find($post['id'])->update(['title' => $request->all()['title'],
            'description' => $request->all()['description'],
            'user_id' => $request->all()['user_id'], ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Post::where('id', $post['id'])->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');
    }
}
