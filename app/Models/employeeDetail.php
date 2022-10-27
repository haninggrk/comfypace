<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'position_id',
        'gender',
        'birthdate',
        'NIK',
        'phone',
        'sosmed01',
        'sosmed02',
        'sosmed03',
        'address',
        'city',
        'province',
        'country',
        'postcode',
        'bankaccount',
        'education',
        'occupation',
        'skill',
        'photo',
        'note01',
        'note02',
        'note03'
    ];

    public function employee_position(){
        return $this->belongsTo(EmployeePosition::class, 'position_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(EmployeePosition::class, 'position_id', 'id');
    }

    public function classes(){
        return $this->hasMany(Classes::class, 'supervisor_id', 'id');
    }

    public function teacher_availability_schedule(){
        return $this->hasMany(TeacherAvailabilitySchedule::class, 'employee_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
