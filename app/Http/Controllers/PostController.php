<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
	    return view('index')->with(['posts' => $post->getPaginateBylimit(1)]);
	    //return view('index')は、resources/viewsのなかのindex(.blade.php←拡張子)ファイルを表す
	    //withの役割はviewファイルにデータを渡している
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }

}
