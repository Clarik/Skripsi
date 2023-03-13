<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job';
    protected $primaryKey = "jobID";

    public function JobVacancy(){
        return $this->belongsTo(JobVacancy::class);
    }
}
