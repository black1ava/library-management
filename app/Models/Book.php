<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookType;
use App\Models\Author;
use App\Models\Borrow;

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
}
