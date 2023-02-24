<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 'students';

    protected $fillable = [
        'id',
        'semester_id',
        'career_id',
        'date_admission',
        'status'
    ];

    
    public function inscripcion_estudiante(){
        return $this->hasMany('App\Models\Incription', 'student_id');
    }

    public function datos(){
        return $this->belongsTo('App\Models\Person', 'id');
    }

    public function semestre(){
        return $this->belongsTo('App\Models\Semester', 'semester_id');
    }

    public function carrera(){
        return $this->belongsTo('App\Models\Career', 'career_id');
    }
}