<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
  
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
