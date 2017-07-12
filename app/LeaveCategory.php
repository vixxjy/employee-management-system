<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    public function leaves()
    {
      return $this->hasMany(leaveApplication::class);
    }
}
