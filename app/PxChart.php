<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PxChart extends Model
{
    protected $table = 'px_charts';

	protected $guarded = [];

    public function user()
	{
		return $this->belongsTo('App\User', 'patient_id', 'id');
	}

	public function appointment()
	{
		return $this->belongsTo('App\Appointment', 'appointment_id', 'id');
	}
}
