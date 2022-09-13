<?php

namespace App\Http\Livewire\UserCategory;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SocialMediaLink;
use App\Models\CategoryProfession;
use Illuminate\Support\Facades\Session;

class UsersCategory extends Component
{
    use WithPagination;

    public $categoryId;
    public $users;

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

    public function mount($slug)
    {

        $category = Category::where('slug', $slug)->first();

        $this->users = $category->users;
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
      $this->facebook = $userSocialLinks->facebook ?? " No social media handle for this user";
      $this->twitter = $userSocialLinks->twitter ?? " No social media handle for this user";
      $this->instagram = $userSocialLinks->instagram  ?? "No social media handle for this user ";
      $this->whatsapp = $member->socialMedia->whatsapp ?? "No social media handle for this user ";
      $this->telegram = $member->socialMedia->telegram ?? "No social media handle for this user ";
      $this->linkedin = $member->socialMedia->linkedin ?? "No social media handle for this user ";
      $this->website = $member->socialMedia->website ?? "No social media handle for this user ";
   }

    public function render()
    {
        return view('livewire.user-category.users-category');
    }
}
