<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerReview extends Model
{
    use HasFactory;
    protected $fillable = ['assessmentID', 'revieweeID', 'sNumber', 'comment', 'typeID'];
    function toReview() {
        return $this->belongsTo(App\Models\Student::class, 'sNumber');
    }
}
