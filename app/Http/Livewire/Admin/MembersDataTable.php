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
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSetAmbassadorNotification;

class MembersDataTable extends Component
{


 
    
    use WithFileUploads;
    use WithPagination;
    use Actions;


    public $pagination = 5;
    public $memberId = null;
    public $showModalForm = false;
    public $showModalAlert = false;
    public $showAlert = false;
    public $search = "";
    public $postedPotraitImage;
    
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

        $newSetAmbassador = SetAmbassador::updateOrCreate(
            [
            'year' => Carbon::create($this->year)->format('Y'),
            ],

            [
              'user_id' => $member->id,
            ]);

        $members = User::all();

        Notification::send($members, new NewSetAmbassadorNotification($newSetAmbassador));

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
        Storage::delete('public/members_images', $member->potrait_image);
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
        return User::select('id','first_name','last_name','email','profile_photo_path','address','phone','graduation_year_id')->with(['graduationYear'])->when($this->selectedHouseFilter, function($query) {
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
