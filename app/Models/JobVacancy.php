<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'jobvacancy';
    protected $primaryKey = "jobVacancyID";

    public function Job(){
        return $this->hasOne(Job::class,'jobID','jobID');
    }

    public function MSME() {
        return $this->belongsTo(MSME::class, 'msmeID', 'msmeID');
    }

    public function Proposal() {
        return $this->hasMany(Proposal::class, 'jobVacancyID', 'jobVacancyID');
    }
}
