<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Hobby;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Position;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Experience;
use App\Models\MembershipFee;
use App\Models\SetAmbassador;
use App\Models\SocialMediaLink;
use App\Models\ExecutiveMembers;
use Laravel\Sanctum\HasApiTokens;
use App\Models\LoginLogoutActivity;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'middle_name', 'last_name', 'about_you', 'date_of_birth',
        'gender_id', 'marital_status_id', 'phone', 'address', 'profession', 'profile_photo_path',
        'workplace', 'university', 'course_of_study', 'state_id', 'city_id', 'entry_year_id', 'graduation_year_id',
        'jss_class', 'sss_class', 'admission_number', 'house_id', 'potrait_image', 'active'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::Class, 'category_user');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function donation()
        {
            return $this->hasMany('App\Models\Donation');
        }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Lga');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    public function house()
    {
        return $this->belongsTo('App\Models\House');
    }

    public function maritalStatus()
    {
        return $this->belongsTo('App\Models\MaritalStatus');
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }

    public function ambassador()
    {
        return $this->hasOne(SetAmbassador::class);
    }

    public function entryYear()
    {
        return $this->belongsTo('App\Models\EntryYear', 'entry_year_id');
    }

    public function graduationYear()
    {
        return $this->belongsTo('App\Models\GraduationYears', 'graduation_year_id');
    }

    public function comment()
    {
        $this->hasMany(Comment::class);
    }

     public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function socialMedia()
    {
        return $this->hasOne(SocialMediaLink::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function membershipfee()
    {
        return $this->hasMany(MembershipFee::class);
    }

   public function authentications()
   {
    return $this->hasMany(LoginLogoutActivity::class);
   }

   public function incrementViewCount() {
        $this->profile_views++;
        return $this->save();
   }

   public function paid()
   {
    $membershipPayment = $this->membershipfee()->where('user_id', auth()->user()->id)
                ->where('year', now()->year)
                ->first();
      return $membershipPayment;       
    
   }



    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('first_name', 'like', $term)
             ->orWhere('last_name', 'like', $term)
             ->orWhere('graduation_year_id', 'like', $term)
             ->orWhere('house_id', 'like', $term)
             ->orWhere('jss_class', 'like', $term)
             ->orWhere('sss_class', 'like', $term)
             ->orWhereHas('state', function ($query) use ($term) {
                 $query->where('name', 'like', $term);
             });
            
     });
    }

    
}
