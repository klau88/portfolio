<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = ['id'];

    public function type()
    {
        return $this->hasOne('App\Type');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
