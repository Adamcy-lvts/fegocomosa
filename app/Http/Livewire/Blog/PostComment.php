<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CommentNotification;

class PostComment extends Component
{
    use Actions;
    
    public $comment;
    public $post;


    public function PostComment($id)
    {
        $post = Post::find($id);

        $comment = new Comment;
        $comment->commentable()->associate($post);
        $comment->comment = $this->comment;
        $comment->user_id = auth()->user()->id;
        $post->comments()->save($comment);

        $commentator = User::find(auth()->user()->id);

        $post->user->notify(new CommentNotification($commentator, $post, $comment));
        
            $this->comment = '';
        
            $this->notification()->success(
                $title = 'Comment Added',
                $description = 'Comment Added Successfully'
            );

        $this->emitUp('refreshParent');
    }

    public function render()
    {
        return view('livewire.blog.post-comment');
    }
}
