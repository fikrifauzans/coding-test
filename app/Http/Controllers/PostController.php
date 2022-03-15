<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showAll()
    {

        $post = Post::latest()->get();
        return view('beanda', compact('post'));
    }

    public function show()
    {
        $post = Post::where('username', '=', Auth::user()->username)->get();
        return view('posts', ['post' => $post]);
    }
    public function create(Request $request)
    {

        $request->validate([
            'content' => 'required',
            'title' => 'required'
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->title = $request->title;
        $post->username = Auth::user()->username;
        $post->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {

        Post::find($request['id'])->delete();
        return redirect()->back();
    }
    public function showUpdate(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'title' => 'required'
        ]);

        $post =  Post::find($request->id);
        $post->content = $request->content;
        $post->title = $request->title;
        $post->username = Auth::user()->username;
        $post->update();

        return redirect()->route('/post');
    }
}
