<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaveApplication extends Model
{
    public function leaveCategory()
    {
      return $this->belongsTo(LeaveCategory::class);
    }
  
    public function leaves()
    {
      return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
