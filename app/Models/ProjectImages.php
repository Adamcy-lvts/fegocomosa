<?php

namespace App\Models;

use App\Models\Project;
use App\Models\ImageCaption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImages extends Model
{
    use HasFactory;

    protected $fillable = ['images', 'project_id', 'caption'];

    public function project()
    {
       return $this->belongsTo(Project::class);
    }

    public function captions()
    {
        return $this->hasOne(ImageCaption::class);
    }
}
