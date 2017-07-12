<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
  public function is_admin()
  {
      if($this->is_admin)
      {
          return true;
      }
      return false;
  }
  
    public function leaves()
    {
      return $this->hasMany(leaveApplication::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function leaveApplications()
    {
        return $this->hasMany(leaveApplication::class);
    }
  
    public function attendance()
    {
        return $this->hasMany(Attendence::class);
    }
}
