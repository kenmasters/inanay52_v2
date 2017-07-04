@extends('admin')

@section('title')
iNanay | Dashboard
@endsection

@section('header')

@endsection

@section('content')
	
	<!-- /# PAGE WRAPPER  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                          
				@include('common.flash-message')

                <div class="col-md-12">
                    <h1 class="page-head-line">DASHBOARD</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            SCHEDULE OF THE DAY
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Appointment</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @if (isset($appointments_today) && $appointments_today->count())
                                     @foreach ($appointments_today as $index => $appointment) @if ($index > 4) @break @endif
                                         <tr>
                                             <td>{{$appointment->schedule->format('g:i A')}}</td>
                                             <td>{{$appointment->name}}</td>
                                             <td>{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}</td>
                                             <td>
                                             @if ($appointment->completed)
                                             <a href="{{route('appointments.show', $appointment->id)}}" class="btn btn-xs btn-info">View Result</a>
                                             @else
                                             {{-- <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result_{{$appointment->id}}">Attach Result</button> --}}
                                             {{-- <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment="{{$appointment}}">Attach Result</button> --}}
                                             <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient_name="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment_id="{{$appointment->id}}" data-appointment_name="{{$appointment->name}}" data-appointment_date="{{$appointment->schedule->format('M d, Y')}}" data-appointment_time="{{$appointment->schedule->format('g:i A')}}" data-form_action="{{route('appointments.update', $appointment->id)}}">Attach Result</button>
                                             @endif
                                             </td>
                                         </tr>
                                     @endforeach
                                     @else
                                         <tr>
                                            <td colspan="4" class="text-center text-uppercase">no appointment schedule today</td>
                                        </tr>
                                     @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-info" data-toggle="modal" data-target="#appointments_today_all" data-backdrop="static" data-keyboard="false">View All</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            EXPECTED LABORS OF THE MONTH
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-hover">
                                   <thead>
                                       <tr>
                                           <th>Name</th>
                                           <th>Due Date</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                   @if (isset($upcoming_labors) && $upcoming_labors->count())
                                   @foreach ($upcoming_labors as $index => $user) @if ($index > 4) @break @endif
                                       <tr>
                                           <td>{{$user->last_name}}, {{$user->first_name}}</td>
                                           <td>{{$user->edc->format('M d, Y')}}</td>
                                           <td>
                                           	<a href="{{ route('users.show', ['id'=>$user->id]) }}" class="btn btn-info btn-xs" style="margin-bottom:5px;"><i class="fa fa-edit"></i> View Profile</a>
                                           </td>
                                       </tr>
                                   @endforeach
                                   @else
                                       <tr>
                                          <td colspan="3" class="text-center text-uppercase">no records found.</td>
                                      </tr>
                                   @endif
                                   </tbody>
                               </table>
                            </div>
                        </div>
                         <div class="panel-footer">
                            <button class="btn btn-info" data-toggle="modal" data-target="#labors_month_all" data-backdrop="static" data-keyboard="false">View All</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            MISSED APPOINTMENTS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Appointment</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @if (isset($missed_appointments) && $missed_appointments->count())
                                     @foreach ($missed_appointments as $index => $appointment) @if ($index > 4) @break @endif
                                         <tr>
                                             <td>{{$appointment->schedule->format('M d, Y')}}</td>
                                             <td>{{$appointment->name}}</td>
                                             <td>{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}</td>
                                             <td>
                                             <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient_name="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment_id="{{$appointment->id}}" data-appointment_name="{{$appointment->name}}" data-appointment_date="{{$appointment->schedule->format('M d, Y')}}" data-appointment_time="{{$appointment->schedule->format('g:i A')}}" data-form_action="{{route('appointments.update', $appointment->id)}}">Attach Result</button>

                                             {{-- <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result_{{$appointment->id}}">Attach Result</button> --}}
                                         </tr>
                                     @endforeach
                                     @else
                                         <tr>
                                            <td colspan="4" class="text-center text-uppercase">no records found.</td>
                                        </tr>
                                     @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{route('appointments.index', ['completed'=>0])}}" class="btn btn-info">View All</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            PREGNANT WOMEN MASTERLIST
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date Registered</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($pregnants_masterlist) && $pregnants_masterlist->count())
                                    @foreach ($pregnants_masterlist as $index => $user) @if ($index > 4) @break; @endif
                                        <tr>
                                            <td>{{$user->created_at->format('M d, Y')}}</td>
                                            <td><a href="{{route('users.show', $user->id)}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                                            <td>{{$user->getAge()}}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                           <td colspan="3" class="text-center text-uppercase">no records found.</td>
                                       </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{route('users.index', ['active' => 1])}}" class="btn btn-info">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->


            <div class="row">
                <div class="col-md-4">
                    <div class="main-box mb-red">
                        <a href="{{route('users.index')}}">
                            <i class="fa fa-5x">{{$total_patients}}</i>
                            <h5>Registered Members</h5>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="main-box mb-pink">
                        <a href="{{url('about-us')}}">
                            <i class="fa fa-users fa-5x"></i>
                            <h5>Meet the Team</h5>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="main-box mb-dull">
                        <a href="https://www.facebook.com/MaMAASIN/">
                            <i class="fa fa-facebook-square fa-5x" aria-hidden="true"></i>
                            <h5>Our Facebook Page</h5>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->

            <hr />

        </div>
        <!-- /. PAGE INNER  -->
    </div>

    <!-- MODALS SECTION -->
   

    <!-- Modal for todays appointments -->
    <div class="modal fade" id="appointments_today_all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Schedule for Today ( {{$today->format('D, M d')}} ) </h3>
          </div>
          <div class="modal-body">
              <div class="table-responsive">
                 <table class="table table-striped table-hover">
                     <thead>
                         <tr>
                             <th>Time</th>
                             <th>Appointment</th>
                             <th>Name</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                      @if (isset($appointments_today) && $appointments_today->count())
                      @foreach ($appointments_today as $index => $appointment) @if ($index > 4) @break @endif
                          <tr>
                              <td>{{$appointment->schedule->format('g:i A')}}</td>
                              <td>{{$appointment->name}}</td>
                              <td>{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}</td>
                              <td>
                              @if ($appointment->completed)
                              <a href="{{route('appointments.show', $appointment->id)}}" class="btn btn-xs btn-info">View Result</a>
                              @else
                              <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient_name="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment_id="{{$appointment->id}}" data-appointment_name="{{$appointment->name}}" data-appointment_date="{{$appointment->schedule->format('M d, Y')}}" data-appointment_time="{{$appointment->schedule->format('g:i A')}}" data-form_action="{{route('appointments.update', $appointment->id)}}">Attach Result</button>
                              @endif
                              </td>
                          </tr>
                      @endforeach
                      @else
                          <tr>
                             <td colspan="4" class="text-center text-uppercase">no appointment schedule today</td>
                         </tr>
                      @endif
                     </tbody>
                 </table>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal for upcoming labors of the month -->
    <div class="modal fade" id="labors_month_all" tabindex="-1" role="dialog" aria-labelledby="">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">EXPECTED LABORS OF THE MONTH</h3>
          </div>
          <div class="modal-body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Due Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      @if (isset($upcoming_labors) && $upcoming_labors->count())
                      @foreach ($upcoming_labors as $index => $user) @if ($index > 4) @break @endif
                          <tr>
                              <td>{{$user->last_name}}, {{$user->first_name}}</td>
                              <td>{{$user->edc->format('M d, Y')}}</td>
                              <td>
                              	<a href="{{ route('users.show', ['id'=>$user->id]) }}" class="btn btn-info btn-xs" style="margin-bottom:5px;"><i class="fa fa-edit"></i> View Profile</a>
                              </td>
                          </tr>
                      @endforeach
                      @else
                          <tr>
                             <td colspan="3" class="text-center text-uppercase">no records found.</td>
                         </tr>
                      @endif
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


   @include('forms.modal-appointment-result-dynamic')

@endsection

@section('footer')
<script>
jQuery('document').ready(function ($) {
	console.log('get ready');

	// $('button.attach-result').click(function(){
	// 	var appointment_name = $(this).data('appointment_name');
	// 	var patient_name = $(this).data('patient_name');
	// 	var appointment_date = $(this).data('appointment_date');
	// 	var appointment_time = $(this).data('appointment_time');
	// 	var form_action = $(this).data('form_action');

	// 	var result = $('#new-appointment-result');

	// 	result.find('#appointment_name').text(appointment_name);
	// 	result.find('#patient_name').text(patient_name);
	// 	result.find('#appointment_date').text(appointment_date);
	// 	result.find('#appointment_time').text(appointment_time);
	// 	result.find('form').attr('action', form_action);
	// });

	// $('#new-appointment-result').on('shown.bs.modal', function () {
	// 	console.log('i got yah');

		
	// })
});
</script>
@endsection