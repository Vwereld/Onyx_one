<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function jobs(){
        return $this->hasMany(Job::class,'id');
    }
    public function jobStatuses(){
        return $this->hasMany(JobStatus::class,'id');
    }
    public function users(){
        return $this->hasMany(User::class,'id');
    }
    public function companies(){
        return $this->hasMany(Company::class,'id');
    }
    public function statuses(){
        return $this->hasMany(Status::class,'id');
    }
    public function approvals(){
        return $this->hasMany(Approval::class,'id');
    }
}
