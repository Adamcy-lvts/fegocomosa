<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\EntryYear;
use App\Models\GraduationYears;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
   
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
      

        Validator::make($input, [
            'username'          => ['required', 'string', 'max:255'],
            'first_name'        => ['required', 'string', 'max:255'],
            // 'last_name'         => ['required', 'string', 'max:255'],
            'date_of_birth'     => ['required'],
            'address'           => ['required', 'string', 'max:255'],
            'gender_id'         => ['required'],
            'marital_status_id' => ['required', 'string', 'max:255'],
            'phone'             => ['required'],
            'state_id'          => ['required'],
            'city_id'            => ['required'],
            'profession'        => ['required', 'string', 'max:255'],
            // 'admission_number'  => ['required', 'string', 'max:255'],
            'jss_class'         => ['required', 'string', 'max:255'],
            'sss_class'         => ['required', 'string', 'max:255'],
            'house_id'          => ['required'],
            'entry_year_id'     => ['required'],
            'graduation_year_id'=> ['required'],
            'workplace'         => ['required', 'string', 'max:255'],
            'university'        => ['required', 'string', 'max:255'],
            'course_of_study'   => ['required', 'string', 'max:255'],
            // 'potrait_image'     => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'marital_status_id' => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => $this->passwordRules(),
            'terms'             => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        // dd($input['city_id']);
     
      $request = request();

    //   dd( $request->hasFile('photo'));

      if ($request->hasFile('photo')) {
        // Get filename with extention 
        $ImageNameWithExt = $request->file('photo')->getClientOriginalName();
        // Get just filename
        $ImageName = pathinfo($ImageNameWithExt, PATHINFO_FILENAME);
        // Get just Extention
        $Extentions = $request->file('photo')->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $ImageName.'_'.time().'.'.$Extentions;
        // Upload Image
        $paths = $request->file('photo')->storeAs('public/profile-photos', $filenameToStore);
       
        $path = 'profile-photos';
        $user = new User;
        $user->profile_photo_path =  $path . '/' . $filenameToStore;

       

    }

 

       $imageWithPath = $user->profile_photo_path;

    
      if ($request->hasFile('potrait_image')) {
        // Get filename with extention 
        $ImageNameWithExt = $request->file('potrait_image')->getClientOriginalName();
        // Get just filename
        $ImageName = pathinfo($ImageNameWithExt, PATHINFO_FILENAME);
        // Get just Extention
        $Extentions = $request->file('potrait_image')->getClientOriginalExtension();
        // Filename to store
        $ImageNameToStore = $ImageName.'_'.time().'.'.$Extentions;
        // Upload Image
        $paths = $request->file('potrait_image')->storeAs('public/members_images/', $ImageNameToStore);

    }

        $gradYear = GraduationYears::create([
            'year' => Carbon::create($input['graduation_year_id'])->format('Y')
        ]);
        $entryYear = EntryYear::create([
            'year' => Carbon::create($input['entry_year_id'])->format('Y')
        ]);

        // dd($gradYear->id);

        $user =  User::create([
            'profile_photo_path'=> $imageWithPath,
            'username'          => $input['username'],
            'first_name'        => $input['first_name'],
            'middle_name'       => $input['middle_name'],
            'last_name'         => $input['last_name'],
            'date_of_birth'     => Carbon::create($input['date_of_birth']),
            'address'           => $input['address'],
            'gender_id'         => $input['gender_id'],
            'marital_status_id' => $input['marital_status_id'],
            'phone'             => $input['phone'],
            'state_id'          => $input['state_id'],
            'city_id'            => $input['city_id'],
            'profession'        => $input['profession'],
            'admission_number'  => $input['admission_number'],
            'jss_class'         => $input['jss_class'],
            'sss_class'         => $input['sss_class'],
            'house_id'          => $input['house_id'],
            'entry_year_id'     => $entryYear->id,
            'graduation_year_id'=> $gradYear->id,
            'workplace'         => $input['workplace'],
            'university'        => $input['university'],
            'course_of_study'   => $input['course_of_study'],
            'potrait_image'     => $ImageNameToStore,
            'email'             => $input['email'],
            'password'          => Hash::make($input['password']),
        ]);

        if ($input['profession_category']) {

                $categoryId = $input['profession_category'];
            
                $procategory = Category::find($categoryId); 

                $user->categories()->attach($procategory);
        }
        
      
        return $user;

        
    }
}
