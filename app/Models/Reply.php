<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'reply';

    public function Thread(){
        return $this->belongsTo(Thread::class,'threadID','threadID');
    }

    public function User(){
        return $this->belongsTo(User::class,'userID','userID');
    }
}
