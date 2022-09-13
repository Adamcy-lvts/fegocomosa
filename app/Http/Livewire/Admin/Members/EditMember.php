<?php

namespace App\Http\Livewire\Admin\Members;

use App\Models\Lga;
use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
use App\Models\EntryYear;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\MaritalStatus;
use Livewire\WithFileUploads;
use App\Models\GraduationYears;
use Illuminate\Support\Facades\Storage;

class EditMember extends Component
{

    use WithFileUploads;
    use WithPagination;
    use Actions;

    public $memberId = null;
    public $firstName;
    public $lastName;
    public $middleName;
    public $birthDate;
    public $address;
    public $phone;
    public $maritalStatus;
    public $gender;
    public $selectedState = null;
    public $selectedCity = null;
    public $selectedCategory = null;
    public $profession;
    public $admissionNumber;
    public $jssClass;
    public $sssClass;
    public $selectedHouse;
    public $selectedEntryYear;
    public $university;
    public $selectedGradYear;
    public $workplace;
    public $courseOfStudy;
    public $email;
    public $potraitImage;
    public $postedPotraitImage;
    public $cities;
    public $active;


    public function mount($id)
    {
        $this->memberId = $id;

        $member = User::findOrFail($this->memberId);

        $this->firstName        = $member->first_name;
        $this->lastName         = $member->last_name;
        $this->middleName       = $member->middle_name;
        $this->birthDate        = $member->date_of_birth;
        $this->address          = $member->address;
        $this->phone            = $member->phone; 
        $this->maritalStatus    = $member->marital_status_id; 
        $this->selectedState    = $member->state_id; 
        $this->selectedCity     = $member->city_id; 
        $this->profession       = $member->profession; 
        $this->admissionNumber  = $member->admission_number; 
        $this->jssClass         = $member->jss_class; 
        $this->sssClass         = $member->sss_class;
        $this->selectedHouse    = $member->house_id;
        $this->selectedEntryYear= $member->entry_year_id; 
        $this->selectedGradYear = $member->graduation_year_id; 
        $this->workplace        = $member->workplace; 
        $this->university       = $member->university; 
        $this->postedPotraitImage = $member->potrait_image; 
        $this->courseOfStudy    = $member->course_of_study; 
        $this->email            = $member->email; 
        $this->active           = $member->active;



        $selectedCity = $member->city->id;

        $city = Lga::with('state.cities')->find($selectedCity);

        if ($city) {
            $this->cities = Lga::where('state_id', $city->state->id)->get();

            $this->selectedCity = $city->id;
            $this->selectedState = $city->state->id;
        }
    }


    public function updateMember()
    {
        $this->validate([
            'firstName'     => 'required',
            'lastName'      => 'required',
            'birthDate'     => 'required',
            'address'       => 'required',
            'selectedState' => 'required',
            'selectedCity'  => 'required',

        ]);

        if ($this->potraitImage) {
            // Delete image if it exist 
            Storage::delete('public/members_images/'. $this->postedPotraitImage);
            // Get filename with extention 
            $originalName = $this->potraitImage->getClientOriginalName();
             // Get just filename
            $ImageName = pathinfo($originalName, PATHINFO_FILENAME);
             // Get just Extention
            $Extentions = $this->potraitImage->getClientOriginalExtension();
            // Filename to store
             $this->postedPotraitImage = $this->firstName.'_'.$this->lastName.'_'.time().'.'.$Extentions;

            $this->potraitImage->storeAs('public/members_images/', $this->postedPotraitImage);
        }
// dd($this->active);
        User::find($this->memberId)->update([
            'first_name'        => $this->firstName,
            'last_name'         => $this->lastName,
            'middle_name'       => $this->middleName,
            'date_of_birth'     => $this->birthDate,
            'address'           => $this->address,
            'potrait_image'     => $this->postedPotraitImage,
            'phone'             => $this->phone,
            'marital_status'    => $this->maritalStatus, 
            'state_id'          => $this->selectedState,
            'city_id'           => $this->selectedCity,
            'profession'        => $this->profession, 
            'admission_number'  => $this->admissionNumber,
            'jss_class'         => $this->jssClass, 
            'sss_class'         => $this->sssClass,
            'house_id'          => $this->selectedHouse,
            'entry_year_id'     => $this->selectedEntryYear, 
            'graduation_year_id'=> $this->selectedGradYear,
            'workplace'         => $this->workplace, 
            'university'        => $this->university, 
            'course_of_study'   => $this->courseOfStudy, 
            'email'             => $this->email,
            'active'            => $this->active,
        ]);
        
        $user = User::find($this->memberId);
        // dd($user);

       $procategory = Category::find($this->selectedCategory); 

       $user->categories()->sync($procategory);
      
        $this->notification()->success(
            $title = 'Success',
            $description = 'Member Updated Successfully'
        );

        redirect()->route('members.data');

        session()->flash('flash.banner', 'Record Updated Successfully');
        
    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }


    public function render()
    {
        return view('livewire.admin.members.edit-member', [
            'states' => State::all(),
            'houses' => House::all(),
            'genders' => Gender::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
            'gradYears' => GraduationYears::all(),
            'entryYears' => EntryYear::all(),
            
        ])->layout('components.dashboard');
    }
}
