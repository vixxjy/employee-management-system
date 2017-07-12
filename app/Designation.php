<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function attendance()
    {
      return $this->hasMany(Attendence::class);
    }
}
