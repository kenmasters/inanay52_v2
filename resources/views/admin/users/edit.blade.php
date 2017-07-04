@extends('admin')

@section('title')
iNanay | Users
@endsection

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">

            @include('common.flash-message')
            
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><i class="fa fa-pencil"></i> Edit Patient </h1>
                    {{-- <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1> --}}
                    <h1 class="page-subhead-line">
                        <a href="{{route('users.create')}}" class="btn btn-info"><i class="fa fa-user-plus"></i> Add New Patient</a>
                        @if ($user->active)
                        <a class="btn btn-md btn-info" data-toggle="modal" data-target="#new-appointment"><i class="fa fa-plus"></i> Add Appointment</a>
                        @endif
                        <a type="button" class="btn btn-md btn-info" href="{{route('users.show', $user->id)}}"><i class="fa fa-user"></i> View Profile</a>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 new-appointment">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Patient Details
                        </div>
                        <div class="panel-body">

                            {{-- @include('common.errors') --}}
                       
                           <form role="form" action="{{url('users/' . $user->id)}}" method="post" class="">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="active" {{$user->active ? 'checked' : ''}}>Active (Y/N)
                                    </label>
                                </div>


                                <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                                    <label class="control-label">Last Name</label>
                                    <input required class="form-control" type="text" name="last_name" value="{{$user->last_name}}">
                                    @if ($errors->has('last_name')) <small class="help-block">
                                        <strong>{{$errors->first('last_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                                    <label class="control-label">First Name</label>
                                    <input required class="form-control" type="text" name="first_name" value="{{$user->first_name}}">
                                    @if ($errors->has('first_name')) <small class="help-block">
                                        <strong>{{$errors->first('first_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('middle_name')) has-error @endif">
                                    <label class="control-label">Middle Name</label>
                                    <input class="form-control" type="text" name="middle_name" value="{{$user->middle_name}}">
                                    @if ($errors->has('middle_name')) <small class="help-block">
                                        <strong>{{$errors->first('middle_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('dob')) has-error @endif">
                                    <label class="control-label">Date of Birth ( {{$user->dob->format('m/d/Y')}} )</label>
                                    <input required class="form-control" type="date" name="dob" value="{{isset($user->dob) && $user->dob ? $user->dob->format('Y-m-d') : ""}}">
                                    @if ($errors->has('dob')) <small class="help-block">
                                        <strong>{{$errors->first('dob')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address" value="{{old('address',  $user->address)}}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phonum" value="{{old('phonum',  $user->phonum)}}">
                                </div>

                                <div class="form-group">
                                    <label>Family Serial No.</label>
                                    <input class="form-control" type="text" name="fam_serial_num" value="{{old('fam_serial_num', $user->fam_serial_num)}}">
                                </div>

                                <div class="form-group  @if ($errors->has('blood_type')) has-error @endif">
                                    <label>Blood Type {{$user->blood_type}}</label>
                                    <select required class="form-control" name="blood_type">
                                        <option value=""></option>
                                        <option value="A+" {{ 'A+' == $user->blood_type ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ 'A-' == $user->blood_type ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ 'B+' == $user->blood_type ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ 'B-' == $user->blood_type ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ 'AB+' == $user->blood_type ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ 'AB-' == $user->blood_type ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ 'O+' == $user->blood_type ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ 'O-' == $user->blood_type ? 'selected' : '' }}>O-</option>
                                    </select>
                                    @if ($errors->has('blood_type')) <small class="help-block">
                                        <strong>{{$errors->first('blood_type')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('lmp')) has-error @endif">
                                    <label class="control-label">Last Menstrual Period ( {{isset($user->lmp) && $user->lmp ? $user->lmp->format('m/d/Y') : ""}} )</label>
                                    <input required class="form-control" type="date" name="lmp" value="{{isset($user->lmp) && $user->lmp ? $user->lmp->format('Y-m-d') : ""}}">
                                    @if ($errors->has('lmp')) <small class="help-block">
                                        <strong>{{$errors->first('lmp')}}</strong>
                                    </small>@endif
                                </div>

                                {{-- Submit --}}
                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <button type="reset" class="btn btn-md btn-default reset">Cancel</button>
                                <button type="submit" class="btn btn-md btn-info">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. new-appointment -->

                <div class="col-md-4 medical-history" style="display: none;">
                        <div class="panel panel-info">
                            <div class="panel-heading">Actions</div>
                            <div class="panel-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#new-appointment"><i class="fa fa-plus"></i> Add Appointment</button>
                                    <a type="button" class="btn btn-md btn-info" href="{{route('users.show', $user->id)}}"><i class="fa fa-user"></i> View Profile</a>
                                </div>
                            </div>
                            
                        </div>
                </div>



                <div class="col-md-4 medical-history">
                        <div class="panel panel-info">
                            <div class="panel-heading">Obstetrical History</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Number of Previous Pregnancies</label>
                                    <input class="form-control" type="number" min="0" name="prev_pregnancy" value="{{$user->prev_pregnancy}}">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="prev_caesarian" {{$user->prev_caesarian ? 'checked' : ''}}>Previous Caesarian Section
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="rpl" {{$user->rpl ? 'checked' : ''}}>3 Consecutive Miscarriages
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="stillbirth" {{$user->stillbirth ? 'checked' : ''}}>Stillbirth
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="pph" {{$user->pph ? 'checked' : ''}}>Postparthum Hemorrhage
                                    </label>
                                </div>
                            </div>
                            <div class="panel-heading">Present Health Problems</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="tubercolosis" {{$user->tubercolosis ? 'checked' : ''}}>Tuberculosis ( 14 days+ of cough )
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="heart_disease" {{$user->heart_disease ? 'checked' : ''}}>Heart Disease
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                           <input type="checkbox" value="1" name="diabetes" {{$user->diabetes ? 'checked' : ''}}>Diabetes
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="bronchial_asthma" {{$user->bronchial_asthma ? 'checked' : ''}}>Bronchial Asthma
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="goiter" {{$user->goiter ? 'checked' : ''}}>Goiter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="iodine_deficiency" {{$user->iodine_deficiency ? 'checked' : ''}}>Iodine Supplementation in High Risk Areas
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <!-- /. medical-history -->

            </div>
            <!-- /. ROW  -->
            
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->
    <!-- Small modal -->

    {{-- Modal to show add new appointment --}}
    @include('forms.modal-new-appointment')
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
            
@endsection