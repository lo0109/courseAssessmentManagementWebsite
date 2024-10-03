<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'name', 'description', 'teacherID', 'workshop', 'online'];
    function student() {
        return $this->belongsToMany(\App\Models\User::class, 'enrollments', 'course_id', 'student_id');
    }
    function assessment() {
        return $this->hasMany(\App\Models\Assessment::class, 'course_id');
    }
}
