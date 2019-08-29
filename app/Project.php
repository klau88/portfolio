<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'project_skill');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'project_tag');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
