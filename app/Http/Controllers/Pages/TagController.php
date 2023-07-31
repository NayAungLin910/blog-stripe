<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('pages.tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $posts = Post::forTag($tag->slug())->paginate(2);

        return view('pages.tags.show', compact('tag', 'posts'));
    }
}
