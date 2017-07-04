<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
   
	protected $dates = ['schedule'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'name', 'schedule', 'user_id', 'pending'
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function patient()
	{
		return $this->belongsTo('App\User', 'patient_id', 'id');
	}

	public function chart()
	{
		return $this->hasOne('App\PxChart', 'appointment_id', 'id');
	}

}
