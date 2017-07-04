@extends('admin')

@section('title')
iNanay | Users
@endsection
@section('header')
{{-- <style>
.modal-body {
    max-height: calc(100vh - 212px);
    overflow-y: auto;
}
</style> --}}
@endsection
@section('content')

<div id="page-wrapper">
	<div id="page-inner">
            
         @include('common.flash-message')
		
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Patient Profile</h1>
				<h1 class="page-subhead-line">
					<a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit Profile</a>
                    @if ($user->active)
                    <a class="btn btn-md btn-info" data-toggle="modal" data-target="#new-appointment"><i class="fa fa-plus"></i> Add Appointment</a>
                    @endif
				</h1>
			</div>
		</div>

		<div class="profile-container">
	    

			<div class="row">

		        <!-- begin profile-section -->
		        <div class="profile-section">
		           	<!-- begin profile-left -->
		            <!-- <div class="col-md-3 profile-left">

		                <!-- begin profile-image -->
		               {{--  <div class="profile-image">
		                <img src="{{asset('assets/img/inanay-logo-300x300.png')}}">
		                </div> --}}
		                <!-- end profile-image -->

		                {{-- <div class="m-b-10">
		                    <a href="#" class="btn btn-warning btn-block btn-sm">Change Picture</a>
		                </div> --}}
		                <!-- begin profile-highlight -->
		                {{-- <div class="profile-highlight">
		                <h4><i class="fa fa-cog"></i> Only My Contacts</h4>
		                <div class="checkbox m-b-5 m-t-0">
		                <label><input type="checkbox"> Show my timezone</label>
		                </div>
		                <div class="checkbox m-b-0">
		                <label><input type="checkbox"> Show i have 14 contacts</label>
		                </div>
		                </div> --}}
		                <!-- end profile-highlight -->
		            <!-- </div> -->
		           <!-- end profile-left -->
		           <!-- begin profile-right -->

					<div class="col-md-12 profile">
						<!-- begin profile-info -->
						<div class="profile-info">
							<!-- begin table -->
							<div class="table-responsive">
								<table class="table table-profile">
									<thead>
									<tr>
									   <th class="patient-name" colspan="2">
									       <h1>{{$user->first_name}} {{$user->last_name}}</h1>
									   </th>
									</tr>
									</thead>
									<tbody>

										<tr>
										   <td class="field">Date Registered</td>
										   <td>{{$user->created_at->format('M d, Y')}}</td>
										</tr>
										<tr>
										  <td class="field">Address</td>
										  <td>{{ isset($user->address) && $user->address ? $user->address : 'Not Available' }}</td>
										</tr>

										<tr>
										  <td class="field">Date of Birth</td>
										  <td>{{ isset($user->dob) && $user->dob ? $user->dob->format('M d, Y') : 'Not Available' }}</td>
										</tr>
										<tr>
										<td class="field">Age</td>
										<td>{{ isset($user->dob) && $user->dob ? $user->getAge() . ' y/o' : 'Not Available' }}</td>
										</tr>
										<tr>
										   <td class="field">Phone No.</td>
										   <td>{{ isset($user->phonum) && $user->phonum ? $user->phonum : 'Not Available' }}</td>
										</tr>
										<tr>
										<td class="field">Blood Type</td>
										<td>{{ isset($user->blood_type) && $user->blood_type ? $user->blood_type : 'Not Available' }}</td>
										</tr>

										<tr>
										<td class="field">Last Menstrual Period</td>
										<td>{{ isset($user->lmp) && $user->lmp ? $user->lmp->format('M d, Y') : 'Not Available' }}</td>
										</tr>

										<tr>
										<td class="field">Estimated Date of Conception</td>
										<td>{{ isset($user->edc) && $user->edc ? $user->edc->format('M d, Y') : 'Not Available' }}</td>
										</tr>

									</tbody>
								</table>
							</div>
							<!-- end table -->
						</div>
						<!-- end profile-info -->
					</div>

		           <!-- end profile-right -->
		        </div>
		        <!-- end profile-section -->
			</div>
	   

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<hr />
						<h3>Appointment Schedules</h3>
					<hr/>



					<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover">
						<thead>
						<tr>
							<th>Date</th>
							<th>Appointment</th>
							<th>Status</th>
							<th>Remarks</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						@if(isset($appointments) && $appointments->count())
							@foreach ($appointments as $appointment)
							<tr class="{{strtolower($appointment->status) == 'done' ? 'bg-success' : ''}}">
								<td>{{$appointment->schedule->format('M d, Y g:i A')}}</td>
								<td>{{$appointment->name}}</td>
								<td>{{$appointment->completed ? 'Completed' : 'Pending' }}</td>
								<td>{{isset($appointment->chart) && $appointment->chart ? $appointment->chart->remarks : '' }}</td>
								<td>
								@if (isset($appointment->completed) && $appointment->completed)
								<a href="{{route('appointments.show', $appointment->id)}}" class="btn btn-info btn-xs" style="margin-bottom:5px;">
	                                                                <i class="fa fa-eye"></i> View Result
	                                                            </a>
								@else
								{{-- <a href="" class="btn btn-info btn-xs btn-warning" style="margin-bottom:5px;"><i class="fa fa-eye"></i> Attach Result</a> --}}
                                <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient_name="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment_id="{{$appointment->id}}" data-appointment_name="{{$appointment->name}}" data-appointment_date="{{$appointment->schedule->format('M d, Y')}}" data-appointment_time="{{$appointment->schedule->format('g:i A')}}" data-form_action="{{route('appointments.update', $appointment->id)}}">Attach Result</button>

								@endif
								</td>
							</tr>
							@endforeach
						@else
	                    	<tr><td colspan="5" class="text-center text-uppercase">no entry found.</td></tr>
						@endif
						</tbody>
					</table>
					</div>

				</div>
			</div>

		</div>
		<!-- /. profile-container -->
    </div>
    <!-- /# page-inner -->
</div>
<!-- /# page-wrapper -->




{{-- @if(isset($appointments) && $appointments->count())
  @foreach ($appointments as $appointment) @if (!$appointment->chart) @continue @endif --}}
  
  {{-- Modal --}}
  {{-- <div class="modal fade" id="appointment_{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">{{$appointment->name}} ( {{$appointment->schedule->format('D, M d, Y g:i A')}} ) </h3>
        </div>
        <div class="modal-body">
          <ul class="list-group">
          @foreach(array_diff_key($appointment->chart->toArray(), array_flip($exclude_keys)) as $key => $value)
            <li class="list-group-item">{{ucwords(str_replace('_', ' ', $key))}} <span class="badge">N</span></li>
          @endforeach --}}
           {{--  <li class="list-group-item">Deleted <span class="badge">5</span></li> 
            <li class="list-group-item">Warnings <span class="badge">3</span></li>  --}}
          {{-- </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- Modal --}}
{{-- 
  @endforeach         
@endif --}}

{{-- Modal to show add new appointment --}}
@include('forms.modal-new-appointment')
@include('forms.modal-appointment-result-dynamic')


@endsection