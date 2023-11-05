<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sujet extends Model
{
    use HasFactory;
    protected $fillable = [
        'sujet',
        'nameen',
        'namestag1',
        'namestag2',
        'langage',
        'descption',
        'rappoert',
        
        
    ];
}
