<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = [
        'species_id',
        'species_name',
        'category',
    ];

     protected $table = 'species';

}
