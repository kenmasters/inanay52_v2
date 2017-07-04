<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Input;
use Validator;
use Carbon\Carbon;


use App\User;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
        $this->patients = User::where([['status', 1],['user_type', 'patient']]);

        $this->params = [
            'main_menu' => 'users',
            'page' => 'users',
            'sub_menu' => 'users_list',
            'exclude_keys' => ['id', 'created_at', 'updated_at', 'appointment_id', 'user_id', 'patient_id']
        ];

        $this->view_folder_name = 'admin.users.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

   

        $take = $request->input('take', 10);
        $search = $request->input('s', null);
        $active = $request->input('active', null);
        $filter_age_min = (int) $request->input('filter_age_min', 0);
        $filter_age_max = (int) $request->input('filter_age_max', 0);


        $users =  User::where('user_type', 'patient');//['status', 1],

        // Filter by first/last names
        if( $search ) {
            $users->where('first_name', 'like', '%'. $search .'%')
                ->orWhere('last_name', 'like', '%'. $search .'%');
        }

        if( $active != null ) {
            $users->where('active', $active);
        }

        if( $filter_age_max ) {
            $from = Carbon::now()->subYears($filter_age_max + 1)->toDateString();
            $users->where('dob', '>', $from);
        }

        if( $filter_age_min ) {
            $to = Carbon::now()->subYears($filter_age_min)->addDay()->toDateString();
            $users->where('dob', '<', $to);
        }

        // OrderBy
        $users->orderBy('created_at', 'desc');

        $users = $users->paginate($take)->appends($request->all());

        $this->params['months'] = $this->months();
        $this->params['users'] = $users;
        $this->params['request'] = $request;

        // return response()->json($users); // json

        return view($this->view_folder_name.'index', $this->params); // html
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['sub_menu'] = 'user_new';

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
        // Rules
         $rules = [
            'last_name' => 'required',
            'first_name' => 'required',
            'dob' => 'required',
            'blood_type' => 'required',         
            'lmp' => 'required'         
        ];

        $messages = [
            'dob.required' => 'Date of birth is required',
        ];

        // Validate Inputs: user will be redirected back from referrer with validation errors messages.
        $this->validate($request, $rules, $messages); 

        
        $user = new User;

        // Set new user of type `patient`
        $user->user_type = 'patient';

        // Required attributes
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->dob = $request->dob;
        $user->blood_type = $request->blood_type;
        $user->lmp = $request->lmp;

        // Computed based from encoded `lmp`
        $user->edc =$user->getEDC();

        // Optional attributes
        $user->middle_name = $request->input('middle_name', null);
        $user->address = $request->input('address', null);
        $user->fam_serial_num = $request->input('fam_serial_num', null);
        $user->phonum = $request->input('phonum', null);

        // Save
        $user->save();

        $this->params['error'] = false;
        $this->params['msg'] = 'Patient added successfully.';

        return redirect()->route('users.edit', ['id'=>$user->id])->with( $this->params );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // Check for requested user
        $user = User::find($id);
        if (! $user) abort(404);

        $prev_appointments = $user->appointments()->with('chart')->where('schedule', '<=', Carbon::yesterday()->endOfDay())->get();

        $appointments = $user->appointments()->with('chart')->get();

        if ($request->input('debug')) {



        dd( User::with('appointments')->with('appointments.chart')->find($id) );
        dd( $appointments );

            foreach ($user->appointments as $user_appointment) {
                if($user_appointment->schedule <= Carbon::today()->endOfDay()) {

                echo $user_appointment->schedule . ' ' . $user_appointment->name . ' ' . $user_appointment->chart->comments . '<br/>';
                }
            }

            foreach ($prev_appointments as $prev_appointment) {
                if($prev_appointment->schedule <= Carbon::today()->endOfDay()) {

                echo $prev_appointment->schedule . '<br/>';
                }
            }
        }
        
        

        $this->params['appointments'] = $appointments;
        $this->params['user'] = $user;

        // return response()->json($this->params); // json

        // Show profile of user id $id
        return view($this->view_folder_name.'show', $this->params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (! $user) abort();

        $this->params['user'] = $user;

        // return response()->json($this->params); // json
        return view($this->view_folder_name.'edit', $this->params); // json

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

        $user = User::find($id);

        if (!$user) abort();

          $rules = [
             'last_name' => 'required',
             'first_name' => 'required',
             'dob' => 'required',
             'blood_type' => 'required',       
             'lmp' => 'required',
             'prev_pregnancy' => 'integer'     
         ];

         $messages = [
             'dob.required' => 'Date of birth is required',
         ];

         // Validate Inputs: user will be redirected back from referrer with validation errors messages.
         $this->validate($request, $rules, $messages); 

        // Save User profile
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->dob = $request->dob;
        $user->blood_type = $request->blood_type;
        $user->lmp = $request->lmp;
        $user->middle_name = $request->middle_name;
        $user->address = $request->address;
        $user->phonum = $request->input('phonum', null);
        $user->fam_serial_num = $request->fam_serial_num;
        $user->edc = $user->getEDC();

        // Save Medical Data
        $user->prev_pregnancy = $request->prev_pregnancy;
        $user->prev_caesarian = $request->prev_caesarian;
        $user->rpl = $request->rpl;
        $user->stillbirth = $request->stillbirth;
        $user->pph = $request->pph;
        $user->tubercolosis = $request->tubercolosis;
        $user->heart_disease = $request->heart_disease;
        $user->diabetes = $request->diabetes;
        $user->bronchial_asthma = $request->bronchial_asthma;
        $user->goiter = $request->goiter;
        $user->iodine_deficiency = $request->iodine_deficiency;

        if ($user->active != $request->input('active')) {
            $user->active = $request->input('active');
        }

        $user->save();

        $this->params['error'] = false;
        $this->params['user'] = $user;
        $this->params['msg'] = 'Patient details updated successfully.'; 

        // return response()->json($this->params);
        return back()->with( $this->params );

    }

    public function chart (Request $request, $id) {
        $user = User::find($id);
        if (! $user) abort();
        $this->params['user'] = $user;
        return view($this->view_folder_name.'chart', $this->params);
    }


    // Helper Methods
    private function months() {
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $months[] = $month;
        }
        return $months;
    }

    // Naegels Rule Age of Gestation Formula
    private function edc($lmp) {
        // $edc = (($lmp + 1year) - 3mos) + 7days;
        return $edc;
    }


    
}
