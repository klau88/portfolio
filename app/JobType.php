<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $guarded = ['id'];

    public function experience(){
        return $this->belongsTo('App\Experience');
    }
}
