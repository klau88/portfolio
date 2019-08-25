<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function skills()
    {
        return $this->belongsToMany('skills', 'project_skill');
    }

    public function tags()
    {
        return $this->belongsToMany('projects', 'project_tag');
    }
}
