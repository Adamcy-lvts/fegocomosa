<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\CategoryPost;


class PostCategory extends Component
{
    public function mount($slug)
    {
        $category = CategoryPost::where('slug', $slug)->first();

        $this->posts = $category->post;

        // dd($this->posts);
    }

    public function render()
    {
        return view('livewire.blog.post-category', [
            'categories' => CategoryPost::all()
        ]);
    }
}
