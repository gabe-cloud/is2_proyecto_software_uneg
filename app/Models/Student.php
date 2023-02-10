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
        'career_id',
        'date_admission',
        'status'
    ];

    protected $table = 'students';
    
    public function inscripcion_estudiante(){
        return $this->hasMany('App\Models\Incription', 'student_id');
    }

}