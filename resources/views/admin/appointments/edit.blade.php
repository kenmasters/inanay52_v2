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
                    <h1 class="page-head-line"><i class="fa fa-pencil"></i> Edit Appointment</h1>
                    <h1 class="page-subhead-line">
                <a class="btn btn-primary btn-sm" href="{{route('appointments.show', $appointment->id)}}"><i class="fa fa-chevron-left"></i> Back</a>
                        
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 new-appointment">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Appointment Details
                        </div>
                        <div class="panel-body">

                                    <table class="table table-condensed">
                  <thead>
                  <tr>
                     <th colspan="2">
                         <h1 class="m-0" id="appointment_name"></h1>
                     </th>
                  </tr>
                  </thead>
                  <tbody>

                    <tr>
                       <td class="field">Patient Name</td>
                       <td id="patient_name">{{$appointment->patient->last_name}}, {{$appointment->patient->first_name}}</td>
                    </tr>
                    <tr>
                      <td class="field">Date</td>
                      <td id="appointment_date">{{$appointment->schedule->format('M d, Y')}}</td>
                    </tr>
                    <tr>
                      <td class="field">Time</td>
                      <td id="appointment_time">{{$appointment->schedule->format('g:i A')}}</td>
                    </tr>

                  </tbody>
                 </table>



              {{-- {{$appointment->schedule->format('F j, g:i A')}} --}}
              <form role="form" action="{{route('appointments.update', $appointment->id)}}" method="post" class="attach-appointment-result">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>AOG in Months</label>
                                <input class="form-control" type="text" name="aog_in_months" value="{{$appointment->chart->aog_in_months}}">
                            </div>
                            {{-- <div class="form-group">
                                <label>Appointment Date</label>
                                <input disabled class="form-control" type="text" value="{{$appointment->schedule}}">
                            </div> --}}
                            {{-- Vaginal Bleeding --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="vaginal_bleeding" value="1" {{$appointment->chart->vaginal_bleeding ? 'checked' : ''}} /> Vaginal Bleeding (Y/N)
                                </label>
                            </div>
                            {{-- / Vaginal Bleeding --}}
                            {{-- UTI --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="uti" value="1" {{$appointment->chart->uti ? 'checked' : ''}} /> Urinary Track Infection (Y/N)
                                </label>
                            </div>
                            {{-- / UTI --}}
                            {{-- Weight --}}
                            <div class="form-group">
                                <label>Weight in KG.</label>
                                <input class="form-control" type="text" name="weight">
                            </div>
                            {{-- / Weight --}}
                            {{-- BP --}}
                            <div class="form-group">
                                <label>Blood Pressure</label>
                                <input class="form-control" type="text" name="blood_pressure">
                            </div>
                            {{-- / BP --}}
                            {{-- BP >= 140/90 --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hypertension" value="1" {{$appointment->chart->hypertension ? 'checked' : ''}} /> BP 140/90 and Above (Y/N)
                                </label>
                            </div>
                            {{-- / BP >= 140/90 --}}
                            {{-- Fever >= 38deg C. --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="fever" value="1" {{$appointment->chart->fever ? 'checked' : ''}} /> Fever 38 &deg;C and Above (Y/N)
                                </label>
                            </div>
                            {{-- / Fever >= 38deg C. --}}
                            {{-- Pallor --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="pallor" value="1" {{$appointment->chart->pallor ? 'checked' : ''}} /> Pallor (Y/N)
                                </label>
                            </div>
                            {{-- / Pallor --}}
                            {{-- Abnormal Fundal Height --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="abnormal_fundal_height" value="1" {{$appointment->chart->abnormal_fundal_height ? 'checked' : ''}} /> Abnormal Fundal Height (Y/N)
                                </label>
                            </div>
                            {{-- / Abnormal Fundal Height --}}
                            {{-- Abnormal Presentation --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="abnormal_presentation" value="1" {{$appointment->chart->abnormal_presentation ? 'checked' : ''}} /> Abnormal Presentation (Y/N)
                                </label>
                            </div>
                            {{-- / Abnormal Presentation --}}
                            {{-- missing fetal heartbeat --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="missing_fetal_heartbeat" value="1" {{$appointment->chart->missing_fetal_heartbeat ? 'checked' : ''}} /> Missing Fetal Heartbeat (Y/N)
                                </label>
                                
                            </div>
                            {{-- Edema --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="edema" value="1" {{$appointment->chart->edema ? 'checked' : ''}} /> Edema (Y/N)
                                </label>
                                
                            </div>
                            {{-- / Edema --}}
                            {{-- Vaginal Infection --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="vaginal_infection" value="1" {{$appointment->chart->vaginal_infection ? 'checked' : ''}} /> Vaginal infection (Y/N)
                                </label>
                            </div>
                            {{-- / Lab Results --}}
                            <div class="form-group">
                                <label>Lab. Test Results <small>(e.g. HGB, URINE, VDRL)</small></label>
                                <input class="form-control" type="text" name="lab_results">
                            </div>
                            {{-- Action --}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="iron_folate" value="1" {{$appointment->chart->iron_folate ? 'checked' : ''}} /> Iron/Folate #/RX
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="malaria_prophylaxis" value="1" {{$appointment->chart->malaria_prophylaxis ? 'checked' : ''}} /> Malaria Prophylaxis (Y/N)
                                </label>
                            </div>  
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="breastfeed_intent" value="1" {{$appointment->chart->breastfeed_intent ? 'checked' : ''}} /> Mother intends to breasfeed (Y/N)
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="danger_signs" value="1" {{$appointment->chart->danger_signs ? 'checked' : ''}} /> Advice on 4 Danger Signs (Y/N)
                                </label>
                            </div> 
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="dental_checkup" value="1" {{$appointment->chart->dental_checkup ? 'checked' : ''}} /> Dental Checkup (Y/N)
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="eplans_pod" value="1" {{$appointment->chart->eplans_pod ? 'checked' : ''}} /> Emergency Plans and Place of Delivery (Y/N)
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="risk" value="1" {{$appointment->chart->risk ? 'checked' : ''}}/> Risk (Y/N)
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks" class="form-control" rows="5">{{$appointment->chart->remarks}}</textarea>
                            </div>                  
                            {{-- Submit --}}
                            <div class="form-group">
                                <button type="reset" class="btn btn-md btn-default reset">Reset</button>
                                <button type="submit" class="btn btn-md btn-info">Save Changes</button>
                            </div>
              </form>

                        <hr>
                          
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->
            
@endsection