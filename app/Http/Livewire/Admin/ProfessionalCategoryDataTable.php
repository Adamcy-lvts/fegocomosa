<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CategoryProfession;
use Illuminate\Support\Facades\Storage;

class ProfessionalCategoryDataTable extends Component
{


    use WithFileUploads;
    use WithPagination;
    use Actions;


    public $CategoryId = null;
    public $svgIcon;
    public $postedSvgIcon;
    public $icon;
    public $name;
    public $showModalForm = false;
    public $checkedCategories = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search = "";
    public $pagination = 5;
  
    


    public function createCategoryModal()
    {
        $this->reset();
        $this->showModalForm = true;
       
    }

    public function showEditCategory($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->CategoryId = $id;
        $this->loadCategory();
        
    }

    public function loadCategory()
    {
        $procategory = Category::findOrFail($this->CategoryId);

        $this->name           = $procategory->name;
        $this->postedSvgIcon  = $procategory->svg_icon;
        $this->icon           = $procategory->icon;
    
    }

    public function updateProCategory()
    {
        $this->validate([
            'name' => 'required',
            // 'status' => 'required',
      
        ]);


        if ($this->svgIcon) {
            Storage::delete('public/svg_icon/'. $this->postedSvgIcon);
            $this->postedSvgIcon = $this->svgIcon->getClientOriginalName();
            $this->svgIcon->storeAs('public/svg_icons/', $this->postedSvgIcon);
        }
// dd($this->icon);
        Category::find($this->CategoryId)->update([
            'name' => $this->name,
            'svg_icon' => $this->postedSvgIcon,
            'icon' =>  $this->icon,

        ]);

        $this->notification()->success(
            $title = 'Success',
            $description = 'Category Updated Successfully'
        );
        
        
        $this->reset();
        session()->flash('flash.banner', 'Category Updated Successfully');
       

    }

    public function storeProCategory()
    {
        $this->validate([
            'name' => 'required',
            
        ]);


        $svg_name = $this->svgIcon->getClientOriginalName();
        $this->svgIcon->storeAs('public/svg_icons', $svg_name);
        $procategory = new Category();
        $procategory->svg_icon = $svg_name;
        $procategory->name = $this->name;
        $procategory->icon = $this->icon;
     
        $procategory->save();
        
        $this->notification()->success(
            $title = 'Success',
            $description = 'Category Created Successfully'
        );
        $this->reset();
        session()->flash('flash.banner', 'Category Created Successfully');
    }

    public function DeleteConfirmaton($id)
    {
        $this->CategoryId = $id;
        $this->notification()->confirm([
            'title'       => 'Category?',
            'description' => 'You want delete the Category?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteProCategory',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteProCategory()
    {
        $procategory = Category::find($this->CategoryId);
        Storage::delete('public/svg_icons/'.$procategory->svg_icon);
        $procategory->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Project Deleted Successfully'
        );

        session()->flash('flash.banner', 'Category Deleted Successfully');

    }

    public function  deleteRecords()
    {
        Category::whereKey($this->checkedCategories)->delete();
        $this->checkedCategories = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Delete Records',
            $description = 'Records Deleted Successfully'
        );
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedCategories = $this->categories->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedCategories = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedCategories()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedCategories = $this->categoriesQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
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
        
        if ($this->checkedCategories) {
            $this->checkedCategories = [];
            $this->checkPageItems = false;
        }
       
    }

    
    public function ischeckedCategories($event_id)
    {
        return in_array($event_id, $this->checkedCategories);
    }


    public function render()
    {
        return view('livewire.admin.professional-category-data-table', ['procategories' => $this->categories])->layout('components.dashboard');
    }

    public function getCategoriesProperty()
    {
        return $this->categoriesQuery->paginate($this->pagination);
    }

    public function getCategoriesQueryProperty()
    {
        return Category::search(trim($this->search));
    }
}
