<?php

namespace App\Http\Livewire\Admin\Members;

use Carbon\Carbon;
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
use Illuminate\Support\Facades\Hash;

class CreateMember extends Component
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
    public $yearOfEntry;
    public $university;
    public $yearOfGraduation;
    public $workplace;
    public $courseOfStudy;
    public $email;
    public $potraitImage;
    public $postedPotraitImage;
    public $cities;


    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function storeMember()
    {
        // dd('Hi');
        $this->validate([
            'firstName'     => 'required',
            'lastName'      => 'required',
            'birthDate'     => 'required',
            'address'       => 'required',
            'address'       => 'required',
            'selectedState' => 'required',
            'selectedCity'  => 'required',
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $gradYear = GraduationYears::create([
            'year' => Carbon::create($this->yearOfGraduation)->format('Y')
        ]);
        $entryYear = EntryYear::create([
            'year' => Carbon::create($this->yearOfEntry)->format('Y')
        ]);

        $potrait_image = $this->potraitImage->getClientOriginalName();
      

        $this->potraitImage->storeAs('public/members_images', $potrait_image);
        $member = new User();
        $member->first_name        =  $this->firstName;
        $member->last_name         =  $this->lastName;
        $member->middle_name       =  $this->middleName;
        $member->date_of_birth     =  Carbon::create($this->birthDate);
        $member->gender_id         =  $this->gender;
        $member->address           =  $this->address;
        $member->phone             =  $this->phone;
        $member->marital_status_id =  $this->maritalStatus;
        $member->state_id          =  $this->selectedState;
        $member->city_id           =  $this->selectedCity;
        $member->profession        =  $this->profession;
        $member->admission_number  =  $this->admissionNumber;
        $member->jss_class         =  $this->jssClass;
        $member->sss_class         =  $this->sssClass;
        $member->house_id          =  $this->selectedHouse;
        $member->entry_year_id     =  $entryYear->id;
        $member->graduation_year_id = $gradYear->id;
        $member->workplace         =  $this->workplace;
        $member->university        =  $this->university;
        $member->potrait_image     =  $potrait_image;
        $member->course_of_study   =  $this->courseOfStudy;
        $member->email             =  $this->email;
        $member->password          = Hash::make('swifty1989');
        $member->save();


        $this->reset();

         

        

        $this->notification()->success(
            $title = 'Success',
            $description = 'Member Created Successfully'
        );

        redirect()->route('members');

        session()->flash('flash.banner', 'Record Added Successfully');
    }
    
    public function render()
    {
        return view('livewire.admin.members.create-member', [
            'states' => State::all(),
            'houses' => House::all(),
            'genders' => Gender::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
            'years' => GraduationYears::all()
        ])->layout('components.dashboard');
    }
}
