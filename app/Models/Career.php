<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'coordinator_id',
        'career_type',
        'name'
    ];

    protected $table = 'careers';

    public function estudiante_carrera(){
        return $this->hasMany('App\Models\Student' ,'career_id');
    }
    
    public function seccion_carrera(){
        return $this->hasMany('App\Models\Section', 'career_id');
    }

}
