<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposal';
    protected $primaryKey = 'proposalID';

    public function User(){
        return $this->belongsTo(User::class,'userID','userID');
    }

    public function JobVacancy(){
        return $this->belongsTo(JobVacancy::class,'jobVacancyID','jobVacancyID');
    }
}
