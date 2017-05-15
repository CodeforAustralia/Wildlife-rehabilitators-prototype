<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $fillable = [
        'license_id',
        'startdate',
        'finishdate',
    ];
}
