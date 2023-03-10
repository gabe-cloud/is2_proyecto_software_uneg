<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'profession',
        'date_admission',
        'professor_type'
    ];


    protected $table = 'professors';

    public function datos(){
        return $this->belongsTo('App\Models\Person', 'id');
    
    }
}
