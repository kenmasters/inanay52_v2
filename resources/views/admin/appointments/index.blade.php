@extends('admin')

@section('title')
iNanay | Appointments
@endsection

@section('content')
	
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">

                @include('common.flash-message')

                <div class="col-md-12">
                    <h1 class="page-head-line">Appointments Overview</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 filters">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Filters <a href="{{route('appointments.index')}}" class="pull-right text-info">Reset</a>
                        </div>
                        <div class="panel-body">
                           <form role="form" class="filter">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" type="date" name="schedule" value="{{$request->get('schedule')}}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="completed">
                                        <option value=""></option>
                                        <option value="1" {{ '1' == $request->get('completed') ? 'selected' : '' }}>Completed</option>
                                        <option value="0" {{ '0' == $request->get('completed') ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>

                                {{-- Submit --}}
                                <div class="form-group">
                                    <button type="reset" class="btn btn-md btn-info reset">Clear</button>
                                    <button type="submit" class="btn btn-md btn-info">Filter</button>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                <!-- /. filters -->
                <div class="col-md-9 users-list">
               {{--  @if ( isset($appointments) && $appointments->count() )
                    @foreach ( $appointments as $appointment )
                    @endforeach
                @endif --}}
                    <div class="panel panel-info">
                        <div class="panel-heading">Appointments</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Appointment</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($appointments) && $appointments->count())
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{isset($appointment->schedule) && $appointment->schedule ? $appointment->schedule->format('F j, Y @ g:i A') : '' }}</td>
                                                <td>{{$appointment->name}}</td>
                                                <td>{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}</td>
                                                <td class="text-capitalize">{{$appointment->completed ? 'completed' : 'pending'}}</td>
                                                <td>
                                                @if ($appointment->completed)
                                                <a href="{{route('appointments.show', $appointment->id)}}" class="btn btn-xs btn-info">View Result</a>
                                                @else
                                                <button type="button" class="attach-result btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result" data-patient_name="{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}" data-appointment_id="{{$appointment->id}}" data-appointment_name="{{$appointment->name}}" data-appointment_date="{{$appointment->schedule->format('M d, Y')}}" data-appointment_time="{{$appointment->schedule->format('g:i A')}}" data-form_action="{{route('appointments.update', $appointment->id)}}">Attach Result</button>

                                                {{-- <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#new-appointment-result_{{$appointment->id}}">Attach Result</button> --}}
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                         <tr><td colspan="5" class="text-center text-uppercase">no records found</td></tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 data-table-filters">
                                    <div class="pull-left dataTables_length">
                                        {{-- <label>Showing 1 - 10 of 50 entries</label> --}}
                                    </div>
                                    <div class="pull-right dataTables_pagination">
                                        @if( isset($appointments) && $appointments->count() )
                                            {!! $appointments->render() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. users-list -->
               
            </div>
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->

    @include('forms.modal-appointment-result-dynamic')
@endsection