<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function cours()
    {
        return $this->hasOne('App\Cours');
    }
}
