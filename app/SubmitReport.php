<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubmitReport extends Model
{
    //
    protected $fillable = [
        'topic_id',
        'file',
        'status',
        'description'
    ];

    public function topic() {
        return $this->belongsTo('App\Topic', 'topic_id');
    }
}
