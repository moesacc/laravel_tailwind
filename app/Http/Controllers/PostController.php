<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('welcome', ['posts' => $posts, 'post' => '']);
    }

    public function store()
    {

        $requests = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Post::create($requests);

        return redirect('/');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $posts = Post::all();

        return view('welcome', ['posts' => $posts, 'post' => $post]);
    }

    public function update(Request $request)
    {
        $post = Post::where('id', '=', $request->id)->first();

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'isDone' => true,
        ]);

        return redirect('/');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }
}
