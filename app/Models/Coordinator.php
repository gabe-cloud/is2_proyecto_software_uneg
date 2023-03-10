<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'appointment',
        'date_admission'
    ];

    protected $table = 'coordinators';

    public function datos(){
        return $this->belongsTo('App\Models\Person', 'id');
    }

}
