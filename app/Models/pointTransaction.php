<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pointTransaction extends Model
{
    use HasFactory;
    public function employee(){
        return $this->belongsTo(User::class,'employee_id');
    }
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }
}
