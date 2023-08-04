<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::where('type', User::WRITER)->get();

        return view('pages.authors.index', compact('authors'));
    }

    public function show(User $user)
    {
        $author = $user;
        
        $posts = Post::where('author_id', $user->id())->paginate(4);

        return view('pages.authors.show', compact('author', 'posts'));
    }
}
