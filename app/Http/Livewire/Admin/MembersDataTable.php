<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Lga;
use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
use App\Models\Position;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\MaritalStatus;
use App\Models\SetAmbassador;
use Livewire\WithFileUploads;
use App\Models\GraduationYears;
use App\Models\ExecutiveMembers;
use App\Models\CategoryProfession;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MembersDataTable extends Component
{


 
    
    use WithFileUploads;
    use WithPagination;
    use Actions;


    public $pagination = 5;
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
    public $showModalForm = false;
    public $showModalAlert = false;
    public $showAlert = false;
    public $search = "";
    public $postedPotraitImage;
    public $potraitImage;
    public $cities;
    public $userCategories;
    public $filteredCities = null;
    public $selectedHouseFilter = null;
    public $FilterByState = null;
    public $FilterByCity = null;
    public $FilterByProfession = null;
    public $checkedUsers = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $forSingleRecord = false;
    public $ModalForm = false;
    public $assaignedRoles = [];
    public $roleId;
    public $userRoles;
    public $assignedPosition;
    public $ModalPositionedForm = false;
    public $userPositions;
    public $AmbassadorModal = false;
    public $year;
    

   
  

    public function assignRole($id)
    {
        $this->ModalForm = true;
        $this->memberId = $id;

        $user = User::find($this->memberId);

        // dd($user->roles);

        $this->assaignedRoles = $this->userRoles = $user->roles()->pluck('id')->map(function ($id) {
            return strval($id);
            })->toArray();
        // dd($this->assaignedRoles);
        
    }

    public function assign()
    {
        $user = User::find($this->memberId);
        
        $user->syncRoles($this->assaignedRoles);
        $this->reset();
        $this->notification()->success(
            $title = 'Success',
            $description = 'Role Assigned Successfully'
        );
        
    }

    public function assignPosition($id)
    {
        $this->ModalPositionedForm = true;
        $this->memberId = $id;

        $user = User::find($this->memberId);

        $this->assignedPosition = $this->userPositions = $user->position()->pluck('id');
    }

    public function givePosition()
    {
        // dd($this->assignedPosition);

       Position::find($this->assignedPosition)->update([
            'user_id' => $this->memberId
        ]);
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Position Assigned Successfully'
        );

    }

    public function makeAmbassador($id)
    {
        $this->memberId = $id;
        $this->AmbassadorModal = true;
    }

    public function assignAmbassador()
    {
        $member = User::find($this->memberId);

        SetAmbassador::updateOrCreate(
            [
            'year' => Carbon::create($this->year)->format('Y'),
            ],

            [
              'user_id' => $member->id,
            ]);

        $this->notification()->success(
            $title = 'Success',
            $description = $member->name.' '.' is now Ambassador to 2010 set'
        );
        $this->reset();
    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function updatedFilterByState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedUsers = $this->users->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedUsers = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedCheckedUsers()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedUsers = $this->usersQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function createMemberModal()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function storeMember()
    {
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

        $potrait_image = $this->potraitImage->getClientOriginalName();
      

        $this->potraitImage->storeAs('public/photos', $potrait_image);
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
        $member->year_of_entry     =  Carbon::create($this->yearOfEntry);
        $member->year_of_graduation = Carbon::create($this->yearOfGraduation);
        $member->workplace         =  $this->workplace;
        $member->university        =  $this->university;
        $member->potrait_image     =  $potrait_image;
        $member->course_of_study   =  $this->courseOfStudy;
        $member->email             =  $this->email;
        $member->password          = Hash::make('swifty1989');
        $member->save();


        $this->reset();
        session()->flash('flash.banner', 'Record Added Successfully');
    }

    public function showEditMember($id)
    {

        $this->reset();
        $this->showModalForm = true;
        $this->memberId = $id;
        $this->cities = collect();

        $user = User::find($this->memberId);

        $selectedCity = $user->city->id;

        $city = Lga::with('state.cities')->find($selectedCity);

        if ($city) {
            $this->cities = Lga::where('state_id', $city->state->id)->get();

            $this->selectedCity = $city->id;
            $this->selectedState = $city->state->id;
        }

        foreach ($user->categories as $this->userCategories) {
            
            $this->selectedCategory = $this->userCategories->pivot->category_id;
        }
       
        $this->loadMember();

   

        
    }

    public function loadMember()
    {
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
        $this->yearOfEntry      = $member->year_of_entry; 
        $this->yearOfGraduation = $member->year_of_graduation; 
        $this->workplace        = $member->workplace; 
        $this->university       = $member->university; 
        $this->postedPotraitImage = $member->potrait_image; 
        $this->courseOfStudy    = $member->course_of_study; 
        $this->email            = $member->email; 

      
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
            Storage::delete('public/photos/'. $this->postedPotraitImage);
            $this->postedPotraitImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/photos/', $this->postedPotraitImage);
        }

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
            'year_of_entry'     => $this->yearOfEntry, 
            'year_of_graduation'=> $this->yearOfGraduation,
            'workplace'         => $this->workplace, 
            'university'        => $this->university, 
            'course_of_study'   => $this->courseOfStudy, 
            'email'             => $this->email 
        ]);
        
        $user = User::find($this->memberId);
        // dd($user);

       $procategory = Category::find($this->selectedCategory); 

       $user->categories()->sync($procategory);
      
        $this->reset();
        session()->flash('flash.banner', 'Record Updated Successfully');
        
    }

    public function SingleDeleteConfirmation($id)
    {
        $this->showAlert = true;
        $this->memberId = $id;
    }

    public function deleteRecord()
    {

       
        if ($this->checkedUsers) {
            $this->checkedUsers = [];
        }
       
        $member = User::find($this->memberId);
        Storage::delete('public/photos', $member->potrait_image);
        $member->delete();

        $this->reset();
        session()->flash('flash.banner', 'Record Deleted Successfully');

    }

    public function DeleteConfirmation() {
        $this->showModalAlert = true;
    }



    public function CancelConfirmation()
    {
        $this->showModalAlert = false;
        $this->showAlert = false;
        
        if ($this->checkedUsers) {
            $this->checkedUsers = [];
            $this->checkPageItems = false;
        }
       
    }

    public function  deleteRecords()
    {
        User::whereKey($this->checkedUsers)->delete();
        $this->checkedUsers = [];
        $this->reset();
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }
    
    public function isCheckedUsers($student_id)
    {
        return in_array($student_id, $this->checkedUsers);
    }

    public function render()
    {

        return view('livewire.admin.members-data-table', [
            'members' => $this->users,
            'states' => State::all(),
            'houses' => House::all(),
            'genders' => Gender::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
            'positions'  => Position::all(),
            'roles' => Role::all(),
            'years' => GraduationYears::all()
        
        ])->layout('components.dashboard');

    }

    public function getUsersProperty()
    {
        return $this->usersQuery->paginate($this->pagination);
    }

    public function getUsersQueryProperty()
    {
        return User::with(['Categories','house','gender','events','state','city'])->when($this->selectedHouseFilter, function($query) {
            $query->where('house_id', $this->selectedHouseFilter);
            })->when($this->FilterByState, function($query) {$query->where('state_id',$this->FilterByState);
            })->when($this->FilterByCity, function($query) {$query->where('city_id', $this->FilterByCity);
            })->when($this->FilterByProfession, function($query) {
            $query->WhereHas('Categories', function ($query) {
            $query->where('category_id', $this->FilterByProfession);
            });
            })->search(trim($this->search));
    }


}
