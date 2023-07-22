<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Jobs\CreatePost;
use App\Jobs\UpdatePost;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->authorizeResource(Post::class, 'post');
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    public function index()
    {
        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $this->dispatchSync(CreatePost::fromRequest($request));

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        $selectedTags = old('tags', $post->tags()->pluck('id')->toArray());

        return view('admin.posts.edit', compact('post', 'tags', 'selectedTags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->dispatchSync(UpdatePost::fromRequest($post, $request));

        return redirect()->route('admin.posts.index')->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {

    }
}
