<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrow;
use App\Models\_Return;

class Student extends Model
{
    use HasFactory;

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }

    public function returns(){
        return $this->hasMany(_Return::class);
    }
}
