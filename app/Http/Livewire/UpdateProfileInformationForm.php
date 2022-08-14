<?php

namespace App\Http\Livewire;

use App\Models\Lga;
use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
use App\Models\EntryYear;
use App\Models\MaritalStatus;
use Livewire\WithFileUploads;
use App\Models\GraduationYears;
use App\Models\CategoryProfession;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    protected $listeners = ['refresh-profile-update-page' => '$refresh'];

    public $potraitImage;
    public $postedPotraitImage;
    public $userId;
    public $cities;
    public $states;
    public $selectedState;
    public $selectedCategory;
    public $selectedRole = null;
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the member.
     *
     * @var mixed
     */
    public $photo;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($selectedCity = null)
    {
        $this->states = State::all();
        $this->cities = collect();

        $this->state = Auth::user()->withoutRelations()->toArray();
        $this->userId = Auth::user()->id;

        $selectedCity = $this->state['city_id'];

        $city = Lga::with('state.cities')->find($selectedCity);

        if ($city) {
            $this->cities = Lga::where('state_id', $city->state->id)->get();

            $this->state['selectedCity'] = $city->id;
            $this->state['selectedState'] = $city->state->id;
        }

        // selected member profession categories

        foreach (Auth::user()->Categories as $userCategories) {

            $this->selectedCategory = $userCategories->pivot->category_id;
        }

    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    /**
     * Update the member's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
 
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('profile.show');
        }

       // Upload Potrait_image
       $user = User::find($this->userId);
       if ($this->potraitImage) {

            $potraitImage = $this->potraitImage->getClientOriginalName();

            // Get just filename
            $ImageName = pathinfo($potraitImage, PATHINFO_FILENAME);

              // Get just Extention
            $Extentions = $this->potraitImage->getClientOriginalExtension();

            // Filename to store
             $ImageNameToStore = $this->state['first_name'].'_'.$this->state['last_name'].'_'.time().'.'.$Extentions;

            $this->potraitImage->storeAs('public/members_images', $ImageNameToStore);

            $user->update([
                'potrait_image' =>  $ImageNameToStore
            ]);

            $this->emit('refresh-profile-update-page');
       }


     // Edit Member Profession Category
       $categoryId =   $this->selectedCategory;

       $procategory = Category::find($categoryId); 

       $user->Categories()->sync($procategory);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Delete member's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        $this->emit('refresh-navigation-menu');
    }

       /**
     * Delete member's potrait profile photo.
     *
     * @return void
     */
    public function deletePotraitImage($id)
    {
        $user = User::find($id);

        Storage::delete('public/members_images/'.$user->potrait_image);
        
        $user->potrait_image = null;
        $user->save();
        $this->emit('refresh-profile-update-page');
    }



    /**
     * Get the current member of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
     
        return view('profile.update-profile-information-form', [
            'houses' => House::all(), 
            'genders' => Gender::all(), 
            'roles'   => Role::all(),
            'maritalStatuses' => MaritalStatus::all(),
            'professionCategories' => Category::all(),
            'gradYears' => GraduationYears::all(),
            'entryYears' => EntryYear::all()
        ]);
    }
}
