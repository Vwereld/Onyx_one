<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    public function job(){
        return $this->belongsTo(Job::class,'id');
    }
}
