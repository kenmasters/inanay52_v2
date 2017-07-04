<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    
    protected $dates = ['dob', 'lmp', 'edc'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointment', 'patient_id', 'id');
    }

    // public function chart()
    // {
    //     return $this->hasMany('App\PxChart', 'patient_id', 'id');
    // }

    public function charts()
    {
        return $this->hasManyThrough('App\PxChart', 'App\Appointment', 'patient_id', 'appointment_id', 'id');
    }


    public function isAdmin() {
        return $this->user_type == 'admin';
    }

    // Return user age
    public function getAge() {
        $birthdate = Carbon::parse($this->dob);
        return Carbon::now()->diffInYears($birthdate);
    }

    // Return estimated date of conception
    public function getEDC() {
        $lmp = Carbon::parse($this->lmp);
        $edc = $lmp->copy()->addYear()->subMonths(3)->addWeek();
        return $edc;
    }
}
