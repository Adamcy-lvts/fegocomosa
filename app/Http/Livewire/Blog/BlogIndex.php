<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use App\Models\CategoryPost;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $pagination = 6;

    
    public function render()
    {
        return view('livewire.blog.blog-index', [
            'posts' => Post::orderBy('created_at', 'DESC')->paginate($this->pagination),
            'categories' => CategoryPost::all(),
        ]);
    }
}
