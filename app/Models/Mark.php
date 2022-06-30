<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id','term'
      ];

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }

    public function mark_list() {
        return $this->hasMany('App\Models\MarkList','mark_id');
    }
}
