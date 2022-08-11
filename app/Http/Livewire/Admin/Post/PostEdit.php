<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PostEdit extends Component
{
    use WithFileUploads;
    use Actions;

    public $postId = null;
    public $title;
    public $body;
    public $image;
    public $userId;
    public $postedImage;
    public $selectedCategory;
    public $status;
    public $featured;

    public function mount($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->userId = $post->user_id;
        $this->selectedCategory = $post->category_post_id;
        $this->postedImage = $post->image;
        $this->body = $post->body;
        $this->status = $post->active;
        $this->featured = $post->featured;
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);
// dd('is it working');
        if ($this->image) {
            Storage::delete('public/blog_images/'. $this->postedImage);
            $this->postedImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/blog_images/', $this->postedImage);
        }

        Post::find($this->postId)->update([
            'title' => $this->title,
            'user_id' => $this->userId,
            'category_post_id' => $this->selectedCategory,
            'slug' =>  Str::slug($this->title),
            'body' =>  $this->body,
            'image' => $this->postedImage,
            'active' => $this->status,
            'featured' => $this->featured
        ]);
        
        $this->notification()->success(
            $title = 'Post Updated',
            $description = 'Post Updated Successfully'
        );

         return redirect()->route('posts.data');
       

    }


    public function render()
    {
        return view('livewire.admin.post.post-edit',
        [
            'body' => $this->body,
            'Categories' => CategoryPost::all()
        ]
        )->layout('components.dashboard');
    }
}
