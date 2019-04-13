<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function approvals(){
        return $this->hasMany(Approval::class,'id','approval_id');
    }
    public function companies(){
        return $this->hasMany(Company::class,'id','contractor_id');
    }
}
