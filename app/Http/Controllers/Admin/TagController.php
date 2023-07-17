<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Jobs\CreateTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }

    public function index()
    {        
        $tags = Tag::paginate(20);

        return view('admin.tags.index', compact('tags'));
    }

    public function create(Request $request)
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        $this->dispatchSync(CreateTag::fromRequest($request));

        return redirect()->route('admin.tags.index')->with('success', 'Tag Created!');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->dispatchSync(UpdateTag::fromRequest($tag, $request));

        return redirect()->route('admin.tags.index')->with('success', 'Tag Updated!');
    }
}
