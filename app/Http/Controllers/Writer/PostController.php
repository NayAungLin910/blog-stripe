<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('author_id', auth()->user()->id)->paginate(5);
        
        return view('writer.posts.index', compact('posts'));
    }
}
