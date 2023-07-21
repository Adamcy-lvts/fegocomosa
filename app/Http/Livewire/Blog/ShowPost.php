<?php

namespace App\Http\Livewire\Blog;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


// use BeyondCode\Comments\Comment;

class ShowPost extends Component
{
    use Actions;
    
    public $post;
    public $postId;
    public $comment;
    public $editedComment;
    public $comments;
    public $editComment = false;
    public $commentId;
    public $replyComment = false;
    public $repliedComment;
    public $repliedCommentId;
    public $chilCommentatorName;
    public $parentCommentator;
    public $likes;
    
    protected $listeners = [
    'refreshParent' => '$refresh',
    ];


    public function mount($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $this->post = $post;
        $this->postId = $post->id;
        
    }

    public function edit($id)
    {
        $this->editComment = true;
        $comment = Comment::find($id);
        $this->commentId = $comment->id;
        $this->editedComment = $comment->comment;
        
    }

    public function updateComment()
    {
        
        Comment::find($this->commentId)->update([
            'comment' => $this->editedComment
        ]);

        $this->editComment = false;
    }

    public function replyToParent($id)
    {
        $this->replyComment = true;
        $comment = Comment::find($id);
        $this->commentId = $comment->id;
        $this->parentCommentator = $comment->user->username;
    }

    public function repliedToParent()
    {
        $post = Post::find($this->post->id);

        $comment = new Comment;
        $comment->commentable()->associate($post);
        $comment->comment = $this->repliedComment;
        $comment->user_id = auth()->user()->id;
        $comment->parent_id = $this->commentId;
        $post->comments()->save($comment);

            $this->repliedComment = '';
            $this->replyComment = false;
        
            $this->notification()->success(
                $title = 'Replied',
                $description = 'Replied To'.' '.$this->parentCommentator
            );
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

         $this->notification()->success(
            $title = 'Comment Delete',
            $description = 'Comment Delete Successfully'
        );

    }

    public function replyToChild($id)
    {

        $this->replyChild = true;
        $comment = Comment::find($id);
        $this->commentId = $comment->id;
        $this->parentCommentator = $comment->user->username;
    }

    public function replyChildComment()
    {
        $post = Post::find($this->post->id);

        $comment = new Comment;
        $comment->commentable()->associate($post);
        $comment->comment = $this->repliedToChild;
        $comment->user_id = auth()->user()->id;
        $comment->parent_id = $this->commentId;
        $post->comments()->save($comment);

        $this->replyChild = false;
        $this->repliedToChild = '';
        $commentator = Comment::find($this->commentId);
        $this->notification()->success(
                $title = 'Replied',
                $description = 'Replied To'.' '.$this->parentCommentator
            );

    }

    public function likePost($id)
    {
        $post = Post::find($id);
        $like = new Like;
        $like->likeable()->associate($post);
        $like->user_id = auth()->user()->id;
        $post->likes()->save($like);
        $this->emitUp('refreshParent');
        return back();
    }

    public function unlikePost($post)
    {
       
        $modelType = $post['likes'][0]['likeable_type'];
        $id = $post['id'];
        $post = Post::find($id);
        $modelType = $modelType;
        auth()->user()->likes()->where('likeable_id', $post->id)->where( 'likeable_type', $modelType)->delete();
        $this->emitUp('refreshParent');
        return back();
    }

    public function likeComment($id)
    {
        
        $comment = Comment::find($id);
       
        $like = new Like;
        $like->likeable()->associate($comment);
        $like->user_id = auth()->user()->id;
        $comment->likes()->save($like);

        return back();

    }

    public function unlikeComment($comment)
    {
         $modelType = $comment['likes'][0]['likeable_type'];
         $id = $comment['id'];
         $comment = Comment::find($id);

         auth()->user()->likes()->where('likeable_id', $comment->id)->where( 'likeable_type', $modelType)->delete();
        
        return back();
    }


    public function render()
    {
        $post = Post::where('id', $this->postId)->first();
        $this->comments = $post->comments;
        $this->likes = $post->likes->count();
        $relatedPosts = Post::where('category_post_id', $post->category_post_id)->inRandomOrder()->limit(4)->get();

            $blogKey = 'blog_'.$post->id;

            if (!Session::has($blogKey)) {
                $post->incrementReadCount();//count the view
                Session::put($blogKey, 1);
            }

            
            return view('livewire.blog.show-post', [
                'post' => $this->post,
                'likes' => $this->likes,
                'latestPost' => $post,
                'relatedPosts' => $relatedPosts,
                'comments' => $this->comments
            ]);
        

        
    }
}
