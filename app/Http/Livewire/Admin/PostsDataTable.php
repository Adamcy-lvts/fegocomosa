<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PostsDataTable extends Component
{


    
    use WithFileUploads;
    use WithPagination;
    use Actions;



    public $postId = null;
    public $title;
    public $body;
    public $image;
    public $postedImage;
    public $checkedPosts = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $showModalForm = false;
    public $showModalAlert = false;
    public $deleteAlert = false;
    public $search = '';
    public $pagination = 5;
    public $TagModalForm = false;
    public $assignedTags;
    public $postTags;
    public $cardModal = false;
    public $status;
    public $featured;
    public $selectedCategory;
 


    public function createPostModal()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function showEditPost($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->postId = $id;
        $this->loadPost();
    }

    public function newModal()
    {
        $this->cardModal = true;
    }

    public function loadPost()
    {
        $post = Post::findOrFail($this->postId);

        $this->title = $post->title;
        $this->body = $post->body;
        $this->postedImage = $post->image;
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'body'  => 'required',
            'image' => 'image|max:1024|nullable'
        ]);

        if ($this->image) {
            Storage::delete('public/photos/'. $this->postedImage);
            $this->postedImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/photos/', $this->postedImage);
        }

        Post::find($this->postId)->update([
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->postedImage
        ]);
        
        $this->reset();
        session()->flash('flash.banner', 'Article Updated Successfully');
       

    }

    

    public function DeleteConfirmaton($id)
    {
        $this->postId = $id;
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the Post?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deletePost',
            'params'      => 'Deleted',
        ]);
    }

    public function deletePost()
    {

        $post = Post::find($this->postId);
        Storage::delete('public/photos', $post->image);
        $post->delete();

        $this->notification()->success(
            $title = 'Post Deleted',
            $description = 'Article Deleted Successfully'
        );
        

    }

 
    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedPosts = $this->posts->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedPosts = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedPosts()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedPosts = $this->postsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    

    public function BulkDeleteConfirmation() {
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the selected records?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteRecords',
            'params'      => 'Deleted',
        ]);
    }



    public function CancelConfirmation()
    {
        $this->showModalForm = false;
        $this->showModalAlert = false;
        $this->deleteAlert = false;
        
        if ($this->checkedPosts) {
            $this->checkedPosts = [];
            $this->checkPageItems = false;
        }
       
    }

    public function  deleteRecords()
    {
        Post::whereKey($this->checkedPosts)->delete();
        $this->checkedPosts = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Delete Records',
            $description = 'Records Deleted Successfully'
        );
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }
    
    public function ischeckedPosts($post_id)
    {
        return in_array($post_id, $this->checkedPosts);
    }

    public function assignTag($id)
    {
        $this->TagModalForm = true;
        $this->postId = $id;

        // $post = Post::find($this->postId);
        
    }

    public function tagged()
    {
     
        // dd($this->assignedTags);
        $post = Post::where($this->postId);
    
        $this->title = $post->title;
        $this->userId = $post->user_id;
        $this->assignedTags = $post->category_post_id;
        $this->postedImage = $post->image;
        $this->body = $post->body;
        $this->status = $post->active;
        $this->featured = $post->featured;
     

       Post::find($this->postId)->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'user_id' => auth()->user()->id,
            'active' => $this->status,
            'featured' => $this->featured,
            'category_post_id' => $this->assignedTags,
            'body' => $this->body,
            'image' => $this->postedImage
        ]);

        $this->reset();
        $this->notification()->success(
            $title = 'Success',
            $description = 'Tagged Successfully'
        );
        
    }

    public function render()
    {
        return view('livewire.admin.posts-data-table', [
            'posts' => $this->posts,
            'tags' => CategoryPost::all()
            
             ])->layout('components.dashboard');
    }

    public function getPostsProperty()
    {
        return $this->postsQuery->paginate($this->pagination);
    }

    public function getPostsQueryProperty()
    {
        return Post::select('id','title','image','created_at','user_id','slug')->with(['user:id,username'])->search(trim($this->search));
    }
}
