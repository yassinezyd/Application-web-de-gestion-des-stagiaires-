<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encadrant extends Model
{
    use HasFactory;
    protected $fillable = [
        'idont',
        'name',
        'email',
        'mobile',
        'specialite',
        
        
    ];
}
