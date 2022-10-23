<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\MaritalStatus;
use App\Models\GraduationYears;

class MemberCategory extends Component
{
    public $search = "";
    public $pagination = 5;
    public $filteredCities      = null;
    public $selectedHouseFilter = null;
    public $FilterByState       = null;
    public $FilterByCity        = null;
    public $FilterByProfession  = null;
    public $cities;
    public $selectedYear;
    public $term;
    public $category_slug;
    public $categoryId;


    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function updatedSelectedState($state_id)
    {
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function updatedFilterByState($state_id)
    {
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function getUsersProperty()
    {
        return $this->usersQuery->paginate($this->pagination);
    }

    public function getUsersQueryProperty()
    {
        return User::with(['Categories','house','gender','events','state','city'])->when($this->selectedHouseFilter, function ($query) {
            $query->where('house_id', $this->selectedHouseFilter);
        })->when($this->FilterByState, function ($query) {
            $query->where('state_id', $this->FilterByState);
        })->when($this->FilterByCity, function ($query) {
            $query->where('city_id', $this->FilterByCity);
        })->when($this->selectedYear, function ($query) {
            $query->where('year_of_graduation', $this->selectedYear);
        })->when($this->FilterByProfession, function ($query) {
            $query->WhereHas('Categories', function ($query) {
                $query->where('category_id', $this->FilterByProfession);
            });
        })->search(trim($this->search));
    }


    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();

        $this->categoryId = $category->id;
        $categoryName = $category->name;


        $this->users = User::whereHas('categories', function ($query) {
            return $query->where('category_id', $this->categoryId);
        })->get();

        return view('livewire.members.member-category', [
             'members' => $this->users,
            //  'members'  => $users,
            'states' => State::all(),
            'houses' => House::all(),
            'genders' => Gender::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
             'years' => GraduationYears::all()
        ]);
    }
}
