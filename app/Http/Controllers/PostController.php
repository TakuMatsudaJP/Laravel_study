<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
	    return view('index')->with(['posts' => $post->getPaginate()]);
	    //return view('index')は、resources/viewsのなかのindex(.blade.php←拡張子)ファイルを表す
	    //withの役割はviewファイルにデータを渡している
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request, Post $post)
    {
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
    return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }


}