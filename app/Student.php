<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    //
    protected $fillable = [
        'user_id',
        'student_code',
        'school_year',
        'class',
    ];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function topic() {
        return $this->hasOne('App\Topic', 'student_id');
    }


}
