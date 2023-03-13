<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = "userID";

    public function MSME(){
        return $this->hasOne(MSME::class,'userID','userID');
    }

    public function Applicant(){
        return $this->hasOne(Applicant::class,'userID','userID');
    }

    public function Certification(){
        return $this->hasMany(Certification::class,'userID','userID');
    }

    public function threads(){
        return $this->hasMany(Thread::class, 'userID', 'userID');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'userID', 'userID');
    }
}
