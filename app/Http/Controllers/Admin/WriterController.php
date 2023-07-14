<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $this->authorize(UserPolicy::SUPERADMIN, User::class);

        $writers = User::where('type', USER::WRITER)->paginate(5);

        return view('admin.writers.index', compact('writers'));
    }

}
    
