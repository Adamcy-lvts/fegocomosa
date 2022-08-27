<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Livewire\WithFileUploads;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Notification;

class CreatePost extends Component
{

    use WithFileUploads;
    use Actions;

    public $postId = null;
    public $title;
    public $body;
    public $image;
    public $selectedCategory;
    public $status;
    public $featured;

    public function createPost()
    {
        // dd('its working');
        $this->validate([
            'title' => 'required',
            // 'body'  => 'required',
            // 'image' => 'required|image|max:1024'
        ]);

// dd($this->status);
        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('public/blog_images', $image_name);
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->image = $image_name;
        $post->category_post_id = $this->selectedCategory;
        $post->active = $this->status;
        $post->featured = $this->featured;
        $post->save();
        $this->reset();

        $this->notification()->success(
            $title = 'Post saved',
            $description = 'Article Published Successfully'
        );

        $users = User::all();

        Notification::send($users, new NewPostNotification($post));

         return redirect()->route('posts.data');

    }

    public function render()
    {
        return view('livewire.admin.post.create-post', [
            'Categories' => CategoryPost::all()
        ])->layout('components.dashboard');
    }
}
