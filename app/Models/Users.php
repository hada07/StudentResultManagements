<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public function students() {
        return $this->belongsTo(Students::class);
    }
    public function lecturer() {
        return $this->belongsTo(Lecturers::class);
    }
}
