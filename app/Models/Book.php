<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookType;

class Book extends Model
{
    use HasFactory;

    public function bookType(){
        return $this->belongsTo(BookType::class);
    }
}
