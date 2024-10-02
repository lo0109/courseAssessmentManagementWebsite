<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['sNumber', 'name', 'password'];
    protected $hidden = ['password'];
    function courses() {
        return $this->belongsToMany(App\Models\Course::class, 'enrollment', 'sNumber', 'courseID');
    }

}
