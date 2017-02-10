<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{

//return $this->hasMany('App\Comment', 'foreign_key');
    public function titres()
    {
        return $this->hasMany('App\Titres',  'cours_id');
    }
    public function image()
    {
        return $this->hasMany('App\Image',  'cours_id');
    }
    public function time()
    {
        return $this->hasMany('App\Time',  'cours_id');
    }

}
