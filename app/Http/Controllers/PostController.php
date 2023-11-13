<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(PostRequest $request, Post $post) // 引数をRequestからPostRequestに変更
    {
        $input = $request['post'];
        $post->fill($input)->save();    # $post->create($input)でも同じ挙動となる
        return redirect('/posts/' . $post->id);
    }
}
?>
