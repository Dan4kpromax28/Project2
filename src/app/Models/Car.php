<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
    use HasFactory;
}
