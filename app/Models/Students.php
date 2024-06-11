<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public function users() {
        return $this->hasOne(Users::class, 'student_id');
    }
    public function subject() {
        return $this->belongsToMany(Subjects::class, 'study');
    }
}
