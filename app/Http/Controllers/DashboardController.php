<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

use App\Appointment;
use App\User;

class DashboardController extends Controller
{
    public function __construct() {
    	
        $this->middleware('admin');
        $this->params = [
            'main_menu' => 'dashboard',
    		'page' => 'dashboard',
    	];
    	$this->view_folder_name = 'admin.';
        
    }
    public function index(Request $request)
    {
        $total_patients = User::where('user_type', 'patient')->count();

        if($request->debug) {

            dd( base_path('database\database.sqlite') );

            dd( $this->upcoming_labors() );

            $birthdate = Carbon::parse('1989-05-16');
            echo Carbon::now()->diffInYears($birthdate) . '<br>';

            $min = 2;
            $max = 5;
            echo 'Today: ' . Carbon::today() . '<br/>';
            echo 'From: ' . Carbon::yesterday()->endOfDay()->subYears(5). '<br/>';
            echo 'To: ' . Carbon::tomorrow()->subYears(2). '<br/>';
            // echo Carbon::createFromDate() . '<br/>';
            // echo $yesterday = Carbon::yesterday()->endOfDay() . '<br/>';
            // echo $today = Carbon::today() . '<br/>';
            // echo $tomorrow = Carbon::tomorrow(). '<br/>';


            foreach ($this->upcoming_labors() as $user) {
                
                echo $user->last_name . ' ' . $user->edc . ' ' . $user->diffInDays .'<br/>';
            }
            dd( User::where('active', 1)->where('user_type', 'patient')->get() );
            dd($this->upcoming_labors());
        }
        // $edc = (($lmp + 1year) - 3mos) + 7days;
        // echo $today . '<br/>';
        // echo $lmp . '<br/>';
        // dd($lmp->diffInDays($today));
        // $this->appointments_today();
        // $this->upcoming_labors();

        // $pregnants_masterlist = Patient::all();

        // dd($pregnants_masterlist);


        // foreach ($appointments_today as $appointment_today) {
        //     echo $appointment_today->date_of_nextvisit->format('g:i A') . ' ' .$appointment_today->name . ' ' . $appointment_today->patient->last_name.', '.$appointment_today->patient->first_name . '<br />';
        // }


        // echo '<br><hr>';
        // Set up params
        $this->params['today'] = Carbon::today();
        $this->params['total_patients'] = $total_patients;
        $this->params['missed_appointments'] = $this->missed_appointments();
        $this->params['appointments_today'] = $this->appointments_today();
        $this->params['upcoming_labors'] = $this->upcoming_labors();
        $this->params['pregnants_masterlist'] = User::where([['active', 1],['user_type', 'patient']])->get();

        return view($this->view_folder_name.'index', $this->params);
    }

    public function aboutus()
    {
         $this->params['main_menu'] = 'aboutus';
         $this->params['page'] = 'about-us';
        return view($this->view_folder_name.'about-us', $this->params);
    }

    private function appointments_today()
    {
        $yesterday = Carbon::yesterday()->endOfDay();
        $tomorrow = Carbon::tomorrow();
        $appointments_today = Appointment::with('patient');
        $appointments_today->whereBetween('schedule', [$yesterday, $tomorrow])->orderBy('schedule');
        return $appointments_today->get();
    }

    private function missed_appointments()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $appointments = Appointment::with('patient');
        $appointments->where([ ['completed', false], ['schedule', '<', $today] ])->orderBy('schedule', 'DESC');
        return $appointments->get();
    }

    // private function upcoming_labors()
    // {
       

    //     $today = Carbon::today();
    //     $upcoming_labors = User::select(['id', 'first_name', 'last_name', 'edc'])
    //     ->where('user_type','patient')
    //     ->where('status', 1)
    //     ->orderBy('edc')
    //     ->get();

    //      return $upcoming_labors;
        
    //     foreach ($upcoming_labors as $user) {
    //         $edc = Carbon::parse($user->edc);
    //         $diffInDays = $edc->diffInDays(Carbon::today());
    //         $user->diffInDays = $diffInDays;
    //     }
    //     return $upcoming_labors;

    // }

    public function upcoming_labors() 
    {
        $users = User::select(['id', 'first_name', 'last_name', 'edc', 'active'])
            ->whereYear('edc', '=', Carbon::now()->year)
            ->whereMonth('edc', '=', Carbon::now()->month)->get();

        return $users;
    }
}
