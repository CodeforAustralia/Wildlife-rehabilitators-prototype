<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SpeciesUsers extends Model
{
    protected $table = 'species_users';

    protected $fillable = [
        'license_id',
        'species_id',
        
    ];

    public $timestamps = false;
}
