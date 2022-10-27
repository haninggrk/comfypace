<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'project_id',
        'status_id',
    ];

    public function student(){
        return $this->belongsTo(student::class, 'user_id');
    }
    public function project(){
        return $this->belongsTo(project::class, 'project_id');
    }
    public function status(){
        return $this->belongsTo(ProjectStatus::class, 'status_id');
    }



}
