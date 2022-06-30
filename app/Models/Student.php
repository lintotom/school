<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id','name','dob','gender'
      ];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher','teacher_id');
    }
}
