<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $this->authorize(UserPolicy::SUPERADMIN, User::class);
        
        $tags = Tag::paginate(20);

        return view('admin.tags.index', compact('tags'));
    }
}
