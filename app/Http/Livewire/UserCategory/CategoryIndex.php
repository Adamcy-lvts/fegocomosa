<?php

namespace App\Http\Livewire\UserCategory;

use Livewire\Component;
use App\Models\Category;

class CategoryIndex extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.user-category.category-index',[
            'membersCategories' => $categories
        ]);
    }
}
