<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 protected $fillable = ['leave_application_id', 'user_id', 'comment'];
    public function leaveApplication()
    {
        return $this->belongsTo(leaveApplication::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
