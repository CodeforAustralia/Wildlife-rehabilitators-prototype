<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_type', 'org_name', 'license_id', 'website', 'contact_person', 'email', 'telephone', 'mobile', 'address', 'suburb', 'postcode', 'state', 'password', 'latitude', 'longitude', 'accept_terms'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function timetable()
    {
        return this->hasMany(Timetable::class);
    }

    public function holidays()
    {
        return this->hasMany(Holidays::class);
    }*/
}
