<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stagiaires extends Model
{
    use HasFactory;
    protected $fillable = [
        'cin',
        'name',
        'sex',
        'age',
        'mobile',
        'email',
        'stage',
        'specialite',
        'etude',
        'cv',
        'datedebut',
        'datefin',
        
    ];
}
