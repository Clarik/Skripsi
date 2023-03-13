<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'thread';

    public function Reply(){
        return $this->hasMany(Reply::class,'threadID','threadID');
    }

    public function User(){
        return $this->belongsTo(User::class,'userID','userID');
    }
}
