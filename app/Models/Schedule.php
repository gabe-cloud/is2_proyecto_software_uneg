<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'day',
        'entry_time',
        'departure_time'
    ];

    protected $table = 'schedules';

    public function asignaturas(){
        return $this->hasMany('App\Models\Course', 'schedules_id');
    }

}
