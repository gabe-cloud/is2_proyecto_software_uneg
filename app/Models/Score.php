<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'course_id',
        'student_id',
        'score',
        'score_date'  
    ];


    protected $table = 'scores';

    
    public function asignatura_nota(){
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    
    public function studiante_nota(){
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

}