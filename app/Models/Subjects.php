<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    public function student() {
        return $this->belongsToMany(Students::class);
    }
    public function lecturer() {
        return $this->belongsToMany(Lecturers::class);
    }
}
