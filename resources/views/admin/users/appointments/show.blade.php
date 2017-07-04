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

.appointment .patient-name h1 {
    margin: 5px 0;
}
</style>
@endsection
@section('content')

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
		<div class="col-md-12">
			<h1 class="page-head-line">
				<a class="btn btn-primary btn-sm" href="{{route('appointments.index')}}"><i class="fa fa-chevron-left"></i> Back</a>
				<a class="btn btn-primary btn-sm" href="{{route('appointments.edit', $appointment->id)}}"><i class="fa fa-pencil"></i> Edit Result</a>

			</h1>
		</div>

		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
						        <div class="panel panel-info">
						          <!-- Default panel contents -->
						        <div class="panel-heading">Appointment Details</div>

						          <!-- Table -->
						         <table class="table table-condensed">
						         	<thead>
						         	<tr>
						         	   <th class="patient-name" colspan="2">
						         	       <h1>{{$appointment->name}} </h1>
						         	   </th>
						         	</tr>
						         	</thead>
						         	<tbody>

						         		<tr>
						         		   <td class="field">Patient Name</td>
						         		   <td>{{$user->first_name}} {{$user->last_name}}</td>
						         		</tr>
						         		<tr>
						         		  <td class="field">Date</td>
						         		  <td>{{ isset($appointment->schedule) && $appointment->schedule ? $appointment->schedule->format('M d, Y') : 'Not Available' }}</td>
						         		</tr>
						         		<tr>
						         		  <td class="field">Time</td>
						         		  <td>{{ isset($appointment->schedule) && $appointment->schedule ? $appointment->schedule->format('g:i A') : 'Not Available' }}</td>
						         		</tr>

						         		<tr>
						         		  <td class="field">Status</td>
						         		  <td class="text-capitalize">{{ $appointment->completed ? 'completed' : 'pending' }}</td>
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
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="panel panel-info">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Appointment Result</div>

				  <!-- Table -->
				  <table class="table table-condensed">
				  	<tbody>
				  		@if ($chart)
				  		@foreach ($checklist as $item => $label)
				  		<tr>
				  		   <td class="field">{{$label}}</td>
				  		   <td>{{isset($chart->$item) && $chart->$item ? ($chart->$item != 1 ? $chart->$item  : 'Yes') : 'No'}}</td>
				  		</tr>
				  		@endforeach
				  		<tr>
				  		   <td class="field">Remarks</td>
				  		   <td>{{isset($chart->remarks) && $chart->remarks ? $chart->remarks : ''}}</td>
				  		</tr>
				  		@else
				  		<tr>
				  		<td colspan="2" class="text-center text-uppercase">no records found</td>
				  		</tr>
				  		<h3></h3>
				  		@endif
				  	</tbody>
				  </table>
				</div>
			</div>		
		</div>
		<!-- /. row -->

    </div>
    <!-- /# page-inner -->
</div>
<!-- /# page-wrapper -->


{{-- <div id="new-appointment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Appointment</h4>
              </div>
              <div class="modal-body">
            <form action="{{route('users.appointments.store', $user->id)}}" method="post">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="email">Appointment</label>
                <input required type="text" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="">Date</label>
                <input  type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
              </div>
              <div class="form-group">
                <label for="">Time</label>
                <input  type="time" class="form-control" name="time" value="{{date('H:i')}}">
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Confirm</label>
              </div>
              <button type="submit" class="btn btn-default">Save</button>
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>
  </div>
</div> --}}






{{-- 
@if(isset($appointments) && $appointments->count())
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
          @endforeach
           <!--  <li class="list-group-item">Deleted <span class="badge">5</span></li> 
            <li class="list-group-item">Warnings <span class="badge">3</span></li>  -->
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- Modal --}}

{{--   @endforeach         
@endif --}}


@endsection