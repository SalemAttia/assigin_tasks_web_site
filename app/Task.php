<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $fillable = [
        'assignedto', 'taskname', 'description', 'statue', 'attachfile', 'deadline'
    ];

     public function user()
    {
            return $this->belongsTo(User::class,'assignedto');
    }
}
