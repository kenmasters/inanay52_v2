<?php
/**
 * Enable seeding from a CSV file
 */

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;
use App\Appointment;


class AppointmentsTableCSVSeeder extends CsvSeeder
{
    public function __construct()
	{
		$this->table = 'appointments';
		$this->filename = base_path().'/database/seeds/csvs/appointments.csv';
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();

		parent::run();
	}
}
