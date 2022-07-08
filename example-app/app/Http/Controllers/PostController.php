<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAll()
    {
        return Post::all();
    }

    public function get($id)
    {
        return Post::where('id', $id)->get();
    }

    public function create(Request $request)
    {
        $post = new Post();

        $post->title = $request->post["title"];
        $post->content = $request->post["content"];
        $post->user_id = $request->post["userId"];

        $post->save();

        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = array_key_exists("title", $request->post) != null ? $request->post["title"] : $post->title;
        $post->content = array_key_exists("content", $request->post) != null ? $request->post["content"] : $post->content;

        $post->save();

        return $post;
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
