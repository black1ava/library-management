<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookType;
use App\Models\Author;
use App\Models\Borrow;
use App\Models\_Return;

class Book extends Model
{
    use HasFactory;

    public function bookType(){
        return $this->belongsTo(BookType::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }

    public function returns(){
        return $this->hasMany(_Return::class);
    }
}
