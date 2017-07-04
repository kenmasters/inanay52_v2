@extends('admin')

@section('title')
iNanay | Users
@endsection
@section('header')
<style>
.modal-body {
    max-height: calc(100vh - 212px);
    overflow-y: auto;
}
</style>
@endsection
@section('content')

<div id="page-wrapper">
	<div id="page-inner">

	<div class="row">
	  <div class="col-md-12">
	      <h1 class="page-head-line">Patient Profile <a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></h1>
	      <h1 class="page-subhead-line"><strong>Date Registered: {{$user->created_at->format('M d, Y')}}</strong> </h1>
	  </div>
	</div>


	<div class="profile-container">
    

		<div class="row">
		    <div class="col-md-12">
		            <!-- begin profile-section -->
		            <div class="profile-section">
		               <!-- begin profile-left -->
		                <div class="col-md-3 profile-left">

		                    <!-- begin profile-image -->
		                    <div class="profile-image">
		                    <img src="{{asset('assets/img/inanay-logo-300x300.png')}}">
		                    </div>
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
		                </div>
		               <!-- end profile-left -->
		               <!-- begin profile-right -->
		               <div class="col-md-9 profile-right">
		                   <!-- begin profile-info -->
		                   <div class="profile-info">
		                       <!-- begin table -->
		                       <div class="table-responsive">
		                           <table class="table table-profile">
		                               <thead>
		                                   <tr>
		                                       <th></th>
		                                       <th>
		                                           <h2>{{$user->first_name}} {{$user->last_name}}</h2>
		                                       </th>
		                                   </tr>
		                               </thead>
		                               <tbody>
		                                  <tr>
		                                      <td class="field">Address</td>
		                                      <td>{{ isset($user->address) && $user->address ? $user->address : 'Not Available' }}</td>
		                                  </tr>
		                                   
		                                   <tr>
		                                      <td class="field">Date of Birth</td>
		                                      <td>{{ isset($user->dob) && $user->dob ? $user->dob->format('F d, Y') : 'Not Available' }}</td>
		                                  </tr>
                                       <tr>
                                          <td class="field">Age</td>
                                          <td>{{ isset($user->dob) && $user->dob ? $user->getAge() . ' y/o' : 'Not Available' }}</td>
                                      </tr>
		                                   <tr>
		                                       <td class="field">Phone #</td>
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
		</div>
               
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			<hr />
			<h3>Present Pregnancy Chart</h3>
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
						<tr>
							<td>{{$appointment->schedule->format('D, M d, Y g:i A')}}</td>
							<td>{{$appointment->name}}</td>
							<td>{{ucfirst($appointment->status)}}</td>
							<td>{{isset($appointment->chart) && $appointment->chart ? $appointment->chart->comments : 'No remarks' }}</td>
							<td>
              <a data-toggle="modal" data-target="#appointment_{{$appointment->id}}" href="" class="btn btn-info btn-xs" style="margin-bottom:5px;">
                                                                <i class="fa fa-edit"></i> View Result
                                                            </a>
							</td>
						</tr>
						
						

						@endforeach
					@else
                    	<tr><td colspan="5" class="text-center text-info">Sorry, no result found.</td></tr>
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

@if(isset($appointments) && $appointments->count())
  @foreach ($appointments as $appointment) @if (!$appointment->chart) @continue @endif
  
  {{-- Modal --}}
  <div class="modal fade" id="appointment_{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          @endforeach
           {{--  <li class="list-group-item">Deleted <span class="badge">5</span></li> 
            <li class="list-group-item">Warnings <span class="badge">3</span></li>  --}}
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal --}}

  @endforeach         
@endif


@endsection