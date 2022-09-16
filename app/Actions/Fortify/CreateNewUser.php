<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Mail\WelcomeMail;
use App\Models\EntryYear;
use Illuminate\Support\Str;
use App\Models\GraduationYears;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
            'photo'             => ['required'],
            'username'          => ['required', 'string', 'max:255', 'unique:users'],
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'date_of_birth'     => ['required'],
            'address'           => ['required', 'string', 'max:255'],
            'gender_id'         => ['required'],
            'marital_status_id' => ['required'],
            'phone'             => ['required'],
            'state_id'          => ['required'],
            'city_id'           => ['required'],
            'profession'        => ['required', 'string', 'max:255'],
            'jss_class'         => ['required', 'string', 'max:255'],
            'sss_class'         => ['required', 'string', 'max:255'],
            'house_id'          => ['required'],
            'entry_year_id'     => ['required'],
            'graduation_year_id'=> ['required'],
            'workplace'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => $this->passwordRules(),
            'terms'             => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
     
      $request = request();


       if ($request->photo) {

        // Get filename with tmp path and extention 
        $ImageNameWithPath = $request->photo;
        // Get just filename without tmp/
        $ImageNameWithExt = Str::after($ImageNameWithPath, 'tmp/');
        // Filename to store
        $avatarNameToStore =  $input['first_name'].'_'.$input['last_name'].'_'.$ImageNameWithExt;
        // $ImageNameToStore = $input['first_name'].'_'.$generatedName;
        // Move Image
        Storage::disk('public')->move($request->photo, "profile-photos/$avatarNameToStore");

    }

    
      if ($request->potraitImage) {   
        // Get filename with tmp path and extention 
        $ImageNameWithPath = $request->potraitImage;
        // Get just filename without tmp/
        $ImageNameWithExt = Str::after($ImageNameWithPath, 'tmp/');
        // Filename to store
        $ImageNameToStore = $input['first_name'].'_'.$input['last_name'].'_'.time().$ImageNameWithExt;
        // $ImageNameToStore = $input['first_name'].'_'.$generatedName;
        // Move Image
        Storage::disk('public')->move($request->potraitImage, "members_images/$ImageNameToStore");
        // $paths = $request->file('potrait_image')->storeAs('public/members_images/', $ImageNameToStore);

    }

        $gradYear = GraduationYears::updateOrCreate([
            'year' => Carbon::create($input['graduation_year_id'])->format('Y')
        ]);

        $entryYear = EntryYear::updateOrCreate([
            'year' => Carbon::create($input['entry_year_id'])->format('Y')
        ]);


        $user =  User::create([
            'profile_photo_path'=> "profile-photos/$avatarNameToStore",
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
        
        Mail::to($user)->send(new WelcomeMail($user));

        return $user;

        
    }
}
