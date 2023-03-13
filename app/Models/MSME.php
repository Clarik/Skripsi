<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSME extends User
{
    use HasFactory;

    protected $table = 'msme';

    public function User(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function JobVacancy() {
        return $this->hasMany(JobVacancy::class, 'msmeID', 'msmeID');
    }

}
