<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ci',
        'name',
        'last_name',
        'phone_number',
        'address',
        'email'
    ];

    protected $table = 'people';

    public function Coordinador(){
        return $this->belongsTo('App\Models\Coordinator', 'id');
    }

    public function Estudiante(){
        return $this->belongsTo('App\Models\Student', 'id');
    }

    public function Profesor(){
        return $this->belongsTo('App\Models\Professor', 'id');
    }


}
