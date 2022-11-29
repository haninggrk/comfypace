<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class milestone extends Model
{
    use HasFactory;
    
public function studentProgresses(){
    return $this->hasMany(studentProgress::class,'milestone_id');
}

}

