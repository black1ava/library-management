<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrow;

class Student extends Model
{
    use HasFactory;

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
}
