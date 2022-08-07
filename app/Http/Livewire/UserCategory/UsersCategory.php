<?php

namespace App\Http\Livewire\UserCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategoryProfession;

class UsersCategory extends Component
{
    public $categoryId;
    public $users;

    public function mount($slug)
    {
        // $this->categoryId = $id;

        $category = Category::where('slug', $slug)->first();

        $this->users = $category->user;
    }

    public function render()
    {
        return view('livewire.user-category.users-category');
    }
}
