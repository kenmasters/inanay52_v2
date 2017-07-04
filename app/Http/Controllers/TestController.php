<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

use App\Appointment;

class TestController extends Controller
{
    public function index(Request $resquest) {
    	$curr_date_start_1d = strtotime(date('Y-m-d') . '+1 day');
    	$curr_date_start = date('Y-m-d').' 00:00:00';
    	$curr_date_end = date('Y-m-d').' 23:59:59';
    	$curr_date_end2 = date('Y-m-d H:i:s' , $curr_date_start_1d);
    	echo "Min: " . $curr_date_start;
    	echo "<br/>";

    	echo "Max: " . $curr_date_end;
    	echo "<br/>";

    	echo "Max: " . date('Y-m-d H:i:s' , $curr_date_start_1d) ;
    	echo "<br/>";


    	// $appointments = Appointment::all();
    	$appointments = Appointment::select();
    	$appointments->whereDate('date_of_nextvisit', '>=', $curr_date_start);
    	// $appointments->whereDate('date_of_nextvisit', '<=', $curr_date_end);
    	$appointments->whereDate('date_of_nextvisit', '<', $curr_date_end2);
    	$appointments->orderBy('date_of_nextvisit');
    	$appointments = $appointments->get();

    	foreach ($appointments as $key => $value) {
    		echo 'Date of next Visit: ' . $value->date_of_nextvisit . '<br />';
    	}
    	echo "<br/><hr/>";

    	$datetimemin = null;
    	$datetimemax = null;
    	echo date('Y-m-d H:i:s');
    }

    public function carbon() {

		// get the current time  - 2015-12-19 10:10:54
		$current = Carbon::now();
		$current = new Carbon();
		echo "$current";

    	echo "<br/><hr/>";

		// get today - 2015-12-19 00:00:00
		$today = Carbon::today();
		echo "Today: $today";

		echo "<br/><hr/>";

		// get yesterday - 2015-12-18 00:00:00
		$yesterday = Carbon::yesterday();
		echo "Yesterday: $yesterday";


    	echo "<br/><hr/>";

		// get tomorrow - 2015-12-20 00:00:00
		$tomorrow = Carbon::tomorrow();

    
		echo "Tomorrow: $tomorrow";


		// parse a specific string - 2016-01-01 00:00:00
		$newYear = new Carbon('first day of January 2016');

		// set a specific timezone - 2016-01-01 00:00:00
		// $newYearPST = new Carbon('first day of January 2016', 'Asia\Manila');

    	echo "<br/><hr/>";

		// Get all appointments for today
    	$appointments = Appointment::whereBetween('date_of_nextvisit', [$yesterday, $tomorrow])
    	->orderBy('date_of_nextvisit');
    	$appointments = $appointments->get();

    	foreach ($appointments as $appointment) {
    		echo 'Date of next Visit: ' . $appointment->date_of_nextvisit . '<br />';
    	}
    }
}
