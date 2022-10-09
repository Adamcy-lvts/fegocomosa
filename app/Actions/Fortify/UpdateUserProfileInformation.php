<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
 
    public function update($user, array $input)
    {
        // dd( $input['selectedRole']);
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // dd($input['selectedCity']);
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                // 'username'          => $input['username'],
                'first_name'        => $input['first_name'],
                'middle_name'       => $input['middle_name'],
                'last_name'         => $input['last_name'],
                'date_of_birth'     => $input['date_of_birth'],
                'address'           => $input['address'],
                'gender_id'         => $input['gender_id'],
                'marital_status_id' => $input['marital_status_id'],
                'phone'             => $input['phone'],
                'state_id'          => $input['selectedState'],
                'city_id'           => $input['selectedCity'],
                'profession'        => $input['profession'],
                'admission_number'  => $input['admission_number'],
                'jss_class_id'      => $input['jss_class_id'],
                'sss_class_id'      => $input['sss_class_id'],
                'house_id'          => $input['house_id'],
                'entry_year_id'     => $input['entry_year_id'],
                'graduation_year_id'=> $input['graduation_year_id'],
                'workplace'         => $input['workplace'],
                'university'        => $input['university'],
                'course_of_study'   => $input['course_of_study'],
                'email' => $input['email'],
            ])->save();
        }

    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            // 'username'          => $input['username'],
            'first_name'        => $input['first_name'],
            'middle_name'       => $input['middle_name'],
            'last_name'         => $input['last_name'],
            'date_of_birth'     => $input['date_of_birth'],
            'address'           => $input['address'],
            'gender_id'         => $input['gender_id'],
            'marital_status_id' => $input['marital_status_id'],
            'phone'             => $input['phone'],
            'state_id'          => $input['selectedState'],
            'city_id'           => $input['selectedCity'],
            'profession'        => $input['profession'],
            'admission_number'  => $input['admission_number'],
            'jss_class_id'      => $input['jss_class_id'],
            'sss_class_id'      => $input['sss_class_id'],
            'house_id'          => $input['house_id'],
            'entry_year_id'     => $input['entry_year_id'],
            'graduation_year_id'=> $input['graduation_year_id'],
            'workplace'         => $input['workplace'],
            'university'        => $input['university'],
            'course_of_study'   => $input['course_of_study'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
