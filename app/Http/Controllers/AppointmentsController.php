<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Appointment;
use App\PxChart;

class AppointmentsController extends Controller
{
    public function __construct() {
        $this->params = [
            'error'                 => false, 
            'status_code'           => 200, 
            'msg'                   => '',
            'form_errors'           => null,
            'results'               => [],
            'results_count'         => 0,
            'is_logged'             => true,
            'forced_login'          => false,
            'main_menu'             => 'appointments',
            
        ];

        $this->view_folder_name = 'admin.appointments.';
        // dd(config('app.prenatal_checklist'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        // dd(Appointment::with('patient')->get());

        // Submenu active
        $this->params['sub_menu'] = 'appointments_list';
        $this->params['request'] = $request;

        // QUERY PARAMS
        $take = $request->input('take', 10);
        $completed = $request->input('completed', null);
        $schedule = $request->input('schedule', null);
        
        $appointments = Appointment::with('patient');

        if ($completed != null) {
            $appointments->where('completed', $completed);
        }

        if ($schedule) {
             // = Carbon::parse($schedule);
            $schedule = Carbon::parse($schedule);
           
            // dd($schedule->addDay()->startOfDay()->toDateTimeString());
            // dd($schedule->subDay()->endOfDay()->toDateTimeString());
            $appointments->where('schedule', '>=', $schedule->startOfDay()->toDateTimeString())->where('schedule', '<=', $schedule->endOfDay()->toDateTimeString());
        }

        // OrderBy
        $appointments->orderBy('created_at', 'asc');
        $appointments = $appointments->paginate($take)->appends($request->all());


        $this->params['appointments'] = $appointments;

        // return response()->json($appointments); // json

        return view($this->view_folder_name.'index', $this->params); // html

        // With filters not yet implemented

        // Filter Variables
        $filter_age_min = (int) $request->input('filter_age_min', 0);
        $filter_age_max = (int) $request->input('filter_age_max', 0);

        $search                     = $request->input('s', null);
        $filter_gender              = $request->input('filter_gender', null);
        $filter_signup              = $request->input('filter_signup', null);
        $filter_nationality         = $request->input('filter_nationality', null);
        $filter_marital_status      = $request->input('filter_marital_status', null);
        $filter_education           = $request->input('filter_education', null);
        $filter_employment_status   = $request->input('filter_employment_status', null);
        $deactivated                = $request->input('deactivated', null);
        $take                       = (int)$request->input('take', 10);


        $order_by_date                  = $request->input('order_by_date', 0);
        $order_by_surveys                 = $request->input('order_by_surveys', 0);
        $order_by_answers               = $request->input('order_by_answers', 0);
        $order_by_comments              = $request->input('order_by_comments', 0);
        $order_by_likes              = $request->input('order_by_likes', 0);

        $appointments = Appointment::with('user');

        // Filters
        if( $search ) {
            $appointments->where('email', 'like', '%'. $search .'%')
                ->orWhere('fullname', 'like', '%'. $search .'%');
        }

        // // begin date range
        // if( $filter_date_min ) {
        //     $filter_date_min = $filter_date_min . ' 00:00:00';
        //     $filter_date_min = new MongoDate(strtotime($filter_date_min));
        //     $appointments->where('created_at', '>=' ,$filter_date_min);
        // }

        // if( $filter_date_max ) {
        //     $filter_date_max = $filter_date_max . ' 23:59:59';
        //     $filter_date_max = new MongoDate(strtotime($filter_date_max));
        //     $surveys->where('created_at', '<=', $filter_date_max);
        // }
        // end date range

        // Search by date visit 
        // Search by date of visit 
        // Search appointment status 


        // Result + Pagination
        $appointments = $appointments->paginate(2)->appends($request->all());
        $this->params['appointments'] = $appointments;

        return response()->json($this->params);

               
        // return view($this->view_folder_name.'index', $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['sub_menu'] = 'appointment_new';

        return view($this->view_folder_name.'create', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request...

        // $appointment = new Appointment;

        // $appointment->name = $request->name;

        // $appointment->save();

        // redirect to lists
        // return redirect('appointments/')->with('message', 'Saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checklist = array_merge(config('app.prenatal_checklist'), config('app.prenatal_actions'));
        $appointment = Appointment::with(['patient', 'chart'])->find($id);

        if( !$appointment ) abort(404);

       // dd( Appointment::with('patient')->find($id)->patient->id );

        $this->params['page'] = 'appointment';
        $this->params['appointment'] = $appointment;
        $this->params['user'] = $appointment->patient;
        $this->params['chart'] = $appointment->chart;
        $this->params['checklist'] = $checklist;

        // dd ( $appointment->chart);

        // return response()->json($this->params); // json

        return view('admin.users.appointments.show', $this->params);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $appointment = Appointment::with('chart','patient')->find($id);

        if( $request->input('debug') ) {
            dd($appointment);
        }
        
        if (! $appointment) abort();

        $this->params['appointment'] = $appointment;

        // return response()->json($this->params); // json
        return view($this->view_folder_name.'edit', $this->params); // json
        // dd(1);

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

        $appointment = Appointment::with('patient')->find($id);

        if (! $appointment) abort(404);
        $appointment_id = $appointment->id;

        if ($request->input('debug')) {
            
            dd( $request->all() );

            $user->user_id = $request->user()->id;
            $appointment_id = $appointment->id;
            $patient_id = $appointment->patient->id;

        }

        $user_id = $request->user()->id;
        $patient_id = $appointment->patient->id;

        $px_app_chart = PxChart::firstOrNew(['appointment_id' => $appointment_id]);
        $px_app_chart->aog_in_months = $request->input("aog_in_months");
        $px_app_chart->vaginal_bleeding = $request->input("vaginal_bleeding");
        $px_app_chart->uti = $request->input("uti");
        $px_app_chart->weight = $request->input("weight");
        $px_app_chart->blood_pressure = $request->input("blood_pressure");
        $px_app_chart->hypertension = $request->input("hypertension");
        $px_app_chart->fever = $request->input("fever");
        $px_app_chart->pallor = $request->input("pallor");
        $px_app_chart->abnormal_fundal_height = $request->input("abnormal_fundal_height");
        $px_app_chart->abnormal_presentation = $request->input("abnormal_presentation");
        $px_app_chart->missing_fetal_heartbeat = $request->input("missing_fetal_heartbeat");
        $px_app_chart->edema = $request->input("edema");
        $px_app_chart->vaginal_infection = $request->input("vaginal_infection");
        $px_app_chart->lab_results = $request->input("lab_results");
        $px_app_chart->iron_folate = $request->input("iron_folate");
        $px_app_chart->malaria_prophylaxis = $request->input("malaria_prophylaxis");
        $px_app_chart->breastfeed_intent = $request->input("breastfeed_intent");
        $px_app_chart->danger_signs = $request->input("danger_signs");
        $px_app_chart->dental_checkup = $request->input("dental_checkup");
        $px_app_chart->eplans_pod = $request->input("eplans_pod");
        $px_app_chart->risk = $request->input("risk");
        $px_app_chart->remarks = $request->input("remarks");
        // $px_app_chart->patient_id = $patient_id;

        $appointment->chart()->save($px_app_chart);

        // Set appointment to completed
        $appointment->completed = true;

        // Update / Save Appointment
        $appointment->save();

        $this->params['error'] = false;
        $this->params['msg'] = 'Appointment updated successfully.'; 

        return back()->with( $this->params );
    }

    
}


 // Rules
//  $rules = [
//     'firstname'   => 'required',
//     'lastname'    => 'required',
//     'dob' => 'required'
// ];

// $messages = [
//     'dob.required' => 'Date of birth is required',
// ];

// Validate
// $this->validate($request, $rules, $messages); // appointment will be redirected back from referrer with validation errors messages.
