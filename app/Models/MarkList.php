<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkList extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id','mark_id','mark'
      ];
    public function mark(){
        return $this->belongsTo('App\Models\Mark','mark_id');
    }
}
