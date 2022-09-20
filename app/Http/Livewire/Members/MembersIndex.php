<?php

namespace App\Http\Livewire\Members;

use App\Models\Lga;
use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\MaritalStatus;
use App\Models\GraduationYears;
use App\Models\SocialMediaLink;
use Illuminate\Support\Facades\Session;

class MembersIndex extends Component
{   
    use WithPagination;

    public $search = "";
    public $pagination = 8;
    public $filteredCities      = null;
    public $selectedHouseFilter = null;
    public $FilterByState       = null;
    public $FilterByCity        = null;
    public $FilterByProfession  = null;
    public $cities;
    public $selectedYear;
    public $term;
    public $filterByCategory;
    public $firstName;
    public $lastName;
    public $middleName;
    public $birthDate;
    public $state;
    public $city;
    public $profession;
    public $gradYear;
    public $house;
    public $workplace;
    public $potraitImage;
    public $profileImage;
    public $memberId;
    public $simpleModal;
    public $address;
    public $email;
    public $phone;
    public $facebook, $twitter, $instagram , $whatsapp, $telegram, $linkedin, $website;
    
 
    public function updatingSearch()
    {
         $this->resetPage();

    }

    public function ClearFilters()
    {
        $this->search = '';
        $this->filteredCities = '';
        $this->selectedHouseFilter = '';
        $this->FilterByState = '';
        $this->FilterByCity = '';
        $this->FilterByProfession = '';

        // $this->resetPage();
    }

    public function ProfileModal($id)
    {
        $this->memberId = $id;
        $this->simpleModal = true;
        $this->profileDetails();

        $member = User::find($this->memberId);

        $profileKey = 'profile_'.$member->id;

        if (!Session::has($profileKey)) {
            $member->incrementViewCount();//count the view
            Session::put($profileKey, 1);
        }


    }

   public function profileDetails()
   {
    
        $member = User::find($this->memberId);

        $userSocialLinks = SocialMediaLink::where('user_id', $this->memberId )->first();

      $this->firstName = $member->first_name;
      $this->lastName = $member->last_name;
      $this->middleName = $member->middle_name;
      $this->profileImage = $member->profile_photo_path;
      $this->potraitImage = $member->potrait_image;
      $this->profession = $member->profession;
      $this->workplace = $member->workplace;
      $this->address = $member->address;
      $this->email = $member->email;
      $this->phone  = $member->phone; 
      $this->gradYear = $member->graduationYear->year;
      $this->facebook = 'https://'.$userSocialLinks->facebook ?? "#";
      $this->twitter = 'https://'.$userSocialLinks->twitter ?? "#";
      $this->instagram = 'https://'.$userSocialLinks->instagram  ?? "#";
      $this->whatsapp = 'https://'.$member->socialMedia->whatsapp ?? "#";
      $this->telegram = 'https://'.$member->socialMedia->telegram ?? "#";
      $this->linkedin = 'https://'.$member->socialMedia->linkedin ?? "#";
      $this->website = 'https://'.$member->socialMedia->website ?? "#";
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
        
        return User::select('id','username','first_name','middle_name','last_name','potrait_image','profession','graduation_year_id')->with(['graduationYear'])->when($this->selectedHouseFilter, function($query) {
            
            $query->where('house_id', $this->selectedHouseFilter);
            })->when($this->FilterByState, function($query) {$query->where('state_id',$this->FilterByState);
            })->when($this->FilterByCity, function($query) {$query->where('city_id', $this->FilterByCity);
            })->when($this->selectedYear, function($query) {$query->where('graduation_year_id', $this->selectedYear);
            })->when($this->FilterByProfession, function($query) {
            $query->WhereHas('Categories', function ($query) {
            $query->where('category_id', $this->FilterByProfession);
            });
            })->search(trim($this->search));

            // $this->resetPage();
    }

    public function render()
    {
       

        return view('livewire.members.members-index', [
            'members' => $this->users,
            'states' => State::all(),
            'houses' => House::all(),
            'genders' => Gender::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
             'years' => GraduationYears::all()
          
        ]);
        

    }
}
