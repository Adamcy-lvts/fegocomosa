<?php

namespace App\Http\Livewire;

use App\Models\Lga;
use App\Models\User;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use Livewire\Component;
use App\Models\Category;
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
     * The new avatar for the user.
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

        // $this->selectedRole = $user->roles-

        

        foreach (Auth::user()->Categories as $userCategories) {
            // dd($userCategories->pivot->category_profession_id);
            $this->selectedCategory = $userCategories->pivot->category_id;
        }

        // $gradYear = GraduationYears::find(Auth::user()->year_of_graduation);

        // dd($gradYear->year);

        //  $this->state['year_of_graduation'] = $gradYear->year;
        
        

    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        // dd($this->selectedRole);
 
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

            $this->potraitImage->storeAs('public/photos', $potraitImage);

            $user->update([
                'potrait_image' =>  $potraitImage
            ]);

            $this->emit('refresh-profile-update-page');
       }

     // Edit Member Profession Category
       $categoryId =   $this->selectedCategory;

       $procategory = Category::find($categoryId); 

       $user->Categories()->sync($procategory);

        
    //    $user->assignRole($role);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        $this->emit('refresh-navigation-menu');
    }

       /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deletePotraitImage($id)
    {
        $user = User::find($id);

        Storage::delete('public/photos/'.$user->potrait_image);
        
        $user->potrait_image = null;
        $user->save();
        $this->emit('refresh-profile-update-page');
    }



    /**
     * Get the current user of the application.
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
            'gradYears' => GraduationYears::all()
        ]);
    }
}
