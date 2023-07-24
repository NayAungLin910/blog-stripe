<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class LatestPost extends Component
{
    public $count = 4;

    public function loadMore()
    {
        $this->count += 4;   
    }

    public function render()
    {
        $posts = Post::loadLatest($this->count);

        return view('livewire.home.latest-post', compact('posts'));
    }
}
