<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'career_id',
        'semesters_id',
        'section_number'
    ];

    protected $table = 'sections';

    public function asignaturas_secciones(){
        return $this->hasMany('App\Models\Course', 'course_id');
    }

    public function semestres_secciones(){
        return $this->belongsTo('App\Models\Semester', 'semesters_id');
    }

    public function carrera(){
        return $this->belongsTo('App\Models\Career', 'career_id');
    }

}
