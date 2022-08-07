<?php

namespace App\Http\Livewire\UserDashboard\Resume;

use Carbon\Carbon;
use App\Models\Hobby;
use App\Models\Skill;
use Livewire\Component;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Experience;
use WireUi\Traits\Actions;

class CreateResume extends Component
{
    use Actions;
    // Education Data
    public $institutionName;
    public $qualification;
    public $fieldStudied;
    public $startDate;
    public $endDate;
    // Experience Data
    public $jobTitle;
    public $employer;
    public $description;
    public $startingDate;
    public $endingDate;
    // Skill Data
    public $skill;
    public $rating;
    // References Data
    public $fullName;
    public $email;
    public $phone;
    public $workAt;
    public $jobPosition;

    //Hobies Data
    public $hobbyInterest;

    public function Resume()
    {
        // For Education
        $this->education();

        // For Experience
       $this->experience();

       $this->reference();

        // For Skill
        $this->skill();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Details Saved'
        );
       
    }

    public function education()
    {
        // dd('can u hear me?');
        $this->validate([
            'institutionName' => 'required'
        ]);

        $education = new Education;
        $education->user_id = auth()->user()->id;
        $education->institution_name = $this->institutionName;
        $education->starting_date = Carbon::create($this->startDate);
        $education->completion_date = Carbon::create($this->endDate);
        $education->certificate = $this->qualification;
        $education->field_of_study = $this->fieldStudied;
        $education->save();

      
        $this->notification()->success(
            $title = 'Success',
            $description = 'Education Details Saved'
        );
        // $this->reset();
      
        

    }

    public function experience()
    {
        $this->validate([
            'jobTitle' => 'required'
        ]);
        // dd('can u hear me?');
         $experience = new Experience;
         $experience->user_id = auth()->user()->id;
         $experience->job_title = $this->jobTitle;
         $experience->employer = $this->employer;
         $experience->description = $this->description;
         $experience->start_date = Carbon::create($this->startingDate);
         $experience->end_date = Carbon::create($this->endingDate);
         $experience->job_title = $this->jobTitle;

         $experience->save();
         $this->notification()->success(
            $title = 'Success',
            $description = 'Experience Details Saved'
        );
        // $this->reset();

       

    }

    public function skill()
    {
        // dd('can u hear me?');
        $this->validate([
           'skill' => 'required',
        //    'rating' => 'required',

        ]);
          $skill = new Skill;
          $skill->user_id = auth()->user()->id;
          $skill->skill_name = $this->skill;
          $skill->rating  = $this->rating;
          $skill->save();

        if ($this->hobbyInterest) {
            $hobby = new Hobby;
                $hobby->user_id = auth()->user()->id;
                $hobby->hobby_name = $this->hobbyInterest;
                $hobby->save();
        }
         

           $this->notification()->success(
            $title = 'Success',
            $description = 'Skill & Hobbies Details Saved'
        );
        // $this->reset();

    }

    public function reference()
    {
        $reference = new Reference;
        $reference->user_id = auth()->user()->id;
        $reference->full_name = $this->fullName;
        $reference->email = $this->email;
        $reference->phone = $this->phone;
        $reference->working_at = $this->workAt;
        $reference->job_title = $this->jobPosition;
        $reference->save();
        
         $this->notification()->success(
            $title = 'Success',
            $description = 'Reference Details Saved'
        );
        // $this->reset();

    }

    // public function hobby()
    // {
    //     $hobbie = new Hobbie;
    //     $hobbie->hobbie_name = $this->hobbyInterest;
    // }


    public function render()
    {
        return view('livewire.user-dashboard.resume.create-resume')->layout('components.user-dashboard');
    }
}
