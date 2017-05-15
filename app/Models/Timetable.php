<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = [
        'license_id',
        'day_of_week',
        'starttime',
        'finishtime',
    ];

    protected $table = 'timetable';

   /* public function user()
    {
        return this->belongsTo(User::class);
    }*/
}
