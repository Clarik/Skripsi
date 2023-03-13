<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends User
{
    use HasFactory;

    protected $table = 'applicant';

    public function User(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

}
