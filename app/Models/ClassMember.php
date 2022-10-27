<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    use HasFactory;
    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function students(){
        return $this->hasOne(User::class,'id','student_id');
    }
}
