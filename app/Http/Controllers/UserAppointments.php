<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Appointment;
use Carbon\Carbon;

use App\User;

class UserAppointments extends Controller
{
    

    public function __construct()
    {

        $this->params = [
            'error'                 => false, 
            'status_code'           => 200, 
            'msg'                   => '',
            'form_errors'           => null,
            'results'               => [],
            'results_count'         => 0,
            'is_logged'             => true,
            'forced_login'          => false,
            'api_version'           => env('API_VERSION'),
            'flagged_types'         =>[ 
                1 => 'Spam', 
                2 => 'Inappropriate'
            ]
        ];

        // $this->user = Auth::user();
        // $this->params['user'] = $this->user;
        $this->view_folder_name = 'admin.users.appointments.';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        
        // echo 'Appointments of user ' . $id;
        $patient = User::find($id);
        if (!$patient) abort();

        dd($patient);
        dd($request->user());
        // return view( $this->view_folder_name.'index', $this->params);   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // Get current login user 
        $user_id = $request->user()->id;
        
        // Retrieve patient by ID
        $patient = User::find($id);
        if (!$patient) abort(404);

        // Set schedule format: Y-m-d H:i
        $schedule = Carbon::parse($request->date.' '.$request->time)->toDateTimeString();

        // Attach appointment to patient
        $patient->appointments()->create([
            'name' => $request->name,
            'schedule' => $schedule,
        ]);

        $this->params['error'] = false;
        $this->params['msg'] = "Appointment added successfully.";

        // return redirect()->route('users.show', $patient->id);
        return back()->with($this->params);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $appointment_id)
    {
        // echo 'Appointments of user ' . $id . ' with specific appointment id ' . $appointment_id;

        $appointment = Appointment::with('chart')->find($appointment_id);

        if( !$appointment ) abort();

        if($request->input('debug')) {
            dd($appointment->chart);
        }

        $this->params['appointment'] = $appointment;

        return response()->json($this->params); // json
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

   
}
