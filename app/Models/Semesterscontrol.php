<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesterscontrol extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'semester_id',
        'course_id',
        'career_id'
    ];

}