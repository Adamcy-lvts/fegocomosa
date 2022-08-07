<?php

namespace App\Http\Livewire\UserDashboard\Resume;

use App\Models\User;
use App\Models\Hobby;
use App\Models\Skill;
use Livewire\Component;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Experience;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class EditResume extends Component
{

  
    use WithPagination;
    use Actions;

//EXPERIENCE PROPERTIES
    public $jobTitle;
    public $employer;
    public $description;
    public $startDate; 
    public $endDate;
    public $experienceId;
    public $experienceForm = false;

//EDUCATION PROPERTIES
    public $institutionName;
    public $course;
    public $certificate;
    public $startingDate;
    public $endingDate;
    public $educationId;
    public $educationForm = false;

//SKILL PROPERTIES
    public $skillName;
    public $rating;
    public $hobbies;
    public $skillId;
    public $skillForm = false;

 //HOBBY PROPERTIES  
    public $hobbyName;
    public $hobbyId; 
    public $hobbyForm = false;

//REFERENCE PROPERTIES
    public $fullName;
    public $jobPosition;
    public $email;
    public $phone;
    public $workAt;
    public $referenceId;
    public $referenceForm = false;

    public $pagination = 5;
    
    
    public $checkedEducationContent = [];
    public $checkedExperienceContent = [];
    public $checkedReferenceContent = [];
    public $checkedSkillContent = [];
    public $checkAllItems = false;
    public $checkPageItems = false;



    public function EditEducation($id)
    {
        //  dd($id);

        $this->educationForm = true;
        $this->educationId = $id;

        $this->loadEducation();
    }

    public function loadEducation()
    {
        
        $education = Education::findOrFail($this->educationId);
        $this->institutionName = $education->institution_name;
        $this->course = $education->field_of_study;
        $this->certificate  = $education->certificate;
        $this->startingDate =    $education->starting_date;
        $this->endingDate =    $education->completion_date;
       
    }

    public function updateEducation()
    {
        $this->validate([
            'institutionName' => 'required', 
        ]);

        $education = Education::find($this->educationId);
        
        $education->update([
             'institution_name'    => $this->institutionName,
            'field_of_study'           => $this->course,
            'certificate'   => $this->certificate,
            'starting_date'     => $this->startingDate,
            'completion_date'     => $this->endingDate,
            
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Education Updated Successfully'
        );
       

    }

    public function DeleteConfirmaton($id)
    {
        $this->educationId = $id;
        $this->notification()->confirm([
            'title'       => 'Education?',
            'description' => 'Are you sure you want to delete this Record?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteEducation',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteEducation()
    {
        $education = Education::find($this->educationId);
       
        $education->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Deleted Successfully'
        );

    }




// Experience Edit 

    public function EditExperience($id)
    {
       
        $this->experienceForm = true;
        $this->experienceId = $id;
        $experience = Experience::find($this->experienceId);


        $this->loadExperienceInfo();
    }

    public function loadExperienceInfo()
    {
        
        $experience = Experience::findOrFail($this->experienceId);
        $this->jobTitle = $experience->job_title;
        $this->employer = $experience->employer;
        $this->description = $experience->description;
        $this->startDate = $experience->start_date;
        $this->endDate = $experience->end_date;
      
    }

    public function updateExperience()
    {
        $this->validate([
            'jobTitle' => 'required', 
        ]);

        $experience = Experience::find($this->experienceId);
        
        $experience->update([
            'job_title'    => $this->jobTitle,
            'employer'    => $this->employer,
            'description'    => $this->description,
            'start_date'    => $this->startDate,
             'end_date'    => $this->endDate,
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Updated Successfully'
        );
       

    }

    public function ExperienceDeleteConfirm($id)
    {
        $this->experienceId = $id;
        $this->notification()->confirm([
            'title'       => 'Experience Record',
            'description' => 'Are You sure you want to delete this record?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteExperience',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteExperience()
    {
        $experience = Experience::find($this->experienceId);
       
        $experience->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Deleted Successfully'
        );

    }

    // Reference Edit
    public function EditReference($id)
    {
       
        $this->referenceForm = true;
        $this->referenceId = $id;
        $reference = Reference::find($this->referenceId);


        $this->loadReferenceInfo();
    }

    public function loadReferenceInfo()
    {
        
        $reference = Reference::findOrFail($this->referenceId);
        $this->fullName = $reference->full_name;
        $this->jobPosition = $reference->job_title;
        $this->email = $reference->email;
        $this->phone = $reference->phone;
        $this->workAt = $reference->working_at;
        
      
    }

    public function updateReference()
    {
        $this->validate([
            'jobTitle' => 'required', 
        ]);

        $reference = Reference::find($this->referenceId);
        
        $reference->update([
             'full_name'    => $this->fullName,
            'job_title'    => $this->jobPosition,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'working_at'    => $this->workAt,
            
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Updated Successfully'
        );
       

    }

    public function ReferenceDeleteConfirm($id)
    {
        $this->referenceId = $id;
        $this->notification()->confirm([
            'title'       => 'Reference Record',
            'description' => 'Are You sure you want to delete this record?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteReference',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteReference()
    {
        $reference = Reference::find($this->referenceId);
       
        $reference->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Deleted Successfully'
        );

    }

    // Skill Edit

    public function EditSkill($id)
    {
       
        $this->skillForm = true;
        $this->skillId = $id;
        $skill = Skill::find($this->skillId);


        $this->loadSkillInfo();
    }

    public function loadSkillInfo()
    {
        
        $skill = Skill::findOrFail($this->skillId);
        $this->skillName = $skill->skill_name;
        $this->rating = $skill->rating;
        
    }

     public function updateSkill()
    {
        $this->validate([
            'SkillName' => 'required', 
        ]);

        $skill = Skill::find($this->skillId);
        
        $skill->update([
             'skill_name'    => $this->skillName,
            'rating'    => $this->rating,
          
            
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Updated Successfully'
        );
       

    }

    public function SkillDeleteConfirm($id)
    {
        $this->skillId = $id;
        $this->notification()->confirm([
            'title'       => 'Skill Record',
            'description' => 'Are You sure you want to delete this record?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteSkill',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteSkill()
    {
        $skill = Skill::find($this->skillId);
       
        $skill->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Deleted Successfully'
        );

        $this->emitTo('ViewResume', '$refresh');

    }
    

    // Hobby Edit

    public function EditHobby($id)
    {
        $this->reset();
        $this->hobbyForm = true;
        $this->hobbyId = $id;
        $skill = Skill::find($this->hobbyId);


        $this->loadHobbyinfo();
    }

    public function loadHobbyinfo()
    {
        
        $hobby = Hobby::findOrFail($this->hobbyId);
        $this->hobbyName = $hobby->hobby_name;
        
    }

     public function updateHobby()
    {
        $this->validate([
            'hobbyName' => 'required', 
        ]);

        $hobby = Hobby::find($this->hobbyId);
        
        $hobby->update([
             'hobby_name'    => $this->hobbyName,
            
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Updated Successfully'
        );   
    
    }

     public function HobbyDeleteConfirm($id)
    {
        $this->hobbyId = $id;
        $this->notification()->confirm([
            'title'       => 'Hobby Record',
            'description' => 'Are You sure you want to delete this record?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteHobby',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteHobby()
    {
        $hobby = Hobby::find($this->hobbyId);
       
        $hobby->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Record Deleted Successfully'
        );

        $this->emitTo('ViewResume', '$refresh');

    }
    



   

    public function render()
    {
        $member = User::find(auth()->user()->id);
        $educations = $member->educations;
        $experiences = $member->experiences;
        $references = $member->references;
        $skills = $member->skills;
        $hobbies = $member->hobbies;
// dd($hobbies);
        return view('livewire.user-dashboard.resume.edit-resume', [
            'educations' => $educations,
            'experiences' => $experiences,
            'references' =>$references,
            'skills'     => $skills,
            'hobbys'   => $hobbies,
        ])->layout('components.user-dashboard');
    }
}
