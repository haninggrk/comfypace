<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'employeeDetail',
        'studentDetail',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function StudentDetail()
    {
        return $this->hasOne(studentDetail::class);
    }
    public function EmployeeDetail()
    {
        return $this->hasOne(employeeDetail::class);
    }
    public function ClassMembers(){
        return $this->hasMany(ClassMember::class,'student_id');
    }
    public function Progresses(){
        return $this->hasMany(StudentProgress::class,'student_id');
    }
    public function SupClasses(){
        return $this->hasMany(Classes::class,'supervisor_id');
    }
    public function project(){
        return $this->hasMany(StudentProject::class,'student_id');
    }
    public function projects(){
        return $this->hasMany(StudentProject::class,'student_id');
    }
    public function RewardTransaction(){
        return $this->hasMany(StudentRewardTransaction::class,'student_id');
    }

    public function roleName(){
        if($this->role == 1){
        return $this->EmployeeDetail->employee_position->position;
        }else{
            return 'Student';
        }
    }
}
