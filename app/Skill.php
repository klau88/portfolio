<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = ['id'];

    public function projects()
    {
        return $this->belongsToMany('projects', 'project_skill', 'skill_id', 'project_id');
    }
}
