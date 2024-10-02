<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['courseID', 'name', 'description', 'teacherID', 'workshop', 'online'];
    function student() {
        return $this->belongsToMany(App\Models\Student::class, 'enrollment', 'courseID', 'sNumber');
    }
    function teacher() {
        return $this->belongsTo(App\Models\Teacher::class, 'teacherID');
    }
    function assessment() {
        return $this->hasMany(App\Models\Assignment::class, 'courseID');
    }
}
