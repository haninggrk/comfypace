<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRewardTransaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'reward_id',
        'status',
    ];

    public function student(){
        return $this->belongsTo(student::class, 'student_id');
    }

    public function reward(){
        return $this->belongsTo(reward::class, 'reward_id');
    }


}
