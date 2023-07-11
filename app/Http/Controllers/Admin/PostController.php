<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('admin.posts.create');
    }

    public function index()
    {
        $this->authorize(UserPolicy::SUPERADMIN, User::class);

        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }
}
