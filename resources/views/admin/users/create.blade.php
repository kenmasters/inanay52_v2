@extends('admin')

@section('title')
iNanay | Users
@endsection

@section('content')
                            
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><i class="fa fa-plus"></i> New Patient</h1>
                </div>
            </div>

            <div class="row">

                <div class="col-md-10 col-md-offset-1 new-user">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Patient Details
                        </div>
                        <div class="panel-body">

                        {{-- @include('common.errors') --}}
                       
                           <form role="form" action="{{url('users')}}" method="post" class="new-appointment">
                                {{ csrf_field() }}

                                <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                                    <label class="control-label">Last Name</label>
                                    <input required class="form-control" type="text" name="last_name" value="{{old('last_name')}}">
                                    @if ($errors->has('last_name')) <small class="help-block">
                                        <strong>{{$errors->first('last_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                                    <label class="control-label">First Name</label>
                                    <input required class="form-control" type="text" name="first_name" value="{{old('first_name')}}">
                                    @if ($errors->has('first_name')) <small class="help-block">
                                        <strong>{{$errors->first('first_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('middle_name')) has-error @endif">
                                    <label class="control-label">Middle Name</label>
                                    <input class="form-control" type="text" name="middle_name" value="{{old('middle_name')}}">
                                    @if ($errors->has('middle_name')) <small class="help-block">
                                        <strong>{{$errors->first('middle_name')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('dob')) has-error @endif">
                                    <label class="control-label">Date of Birth</label>
                                    <input required class="form-control" type="date" name="dob" value="{{old('dob')}}">
                                    @if ($errors->has('dob')) <small class="help-block">
                                        <strong>{{$errors->first('dob')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address" value="{{old('address')}}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phonum" value="{{old('phonum')}}">
                                </div>

                                <div class="form-group">
                                    <label>Family Serial No.</label>
                                    <input class="form-control" type="text" name="fam_serial_num" value="{{old('fam_serial_num')}}">
                                </div>

                                <div class="form-group  @if ($errors->has('blood_type')) has-error @endif">
                                    <label>Blood Type</label>
                                    <select required class="form-control" name="blood_type">
                                        <option value=""></option>
                                        <option value="A+" {{ 'A+' == old('blood_type') ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ 'A-' == old('blood_type') ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ 'B+' == old('blood_type') ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ 'B-' == old('blood_type') ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ 'AB+' == old('blood_type') ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ 'AB-' == old('blood_type') ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ 'O+' == old('blood_type') ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ 'O-' == old('blood_type') ? 'selected' : '' }}>O-</option>
                                    </select>
                                    @if ($errors->has('blood_type')) <small class="help-block">
                                        <strong>{{$errors->first('blood_type')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group @if ($errors->has('lmp')) has-error @endif">
                                    <label class="control-label">LMP</label>
                                    <input required class="form-control" type="date" name="lmp" value="{{old('lmp', date('Y-m-d'))}}">
                                    @if ($errors->has('lmp')) <small class="help-block">
                                        <strong>{{$errors->first('lmp')}}</strong>
                                    </small>@endif
                                </div>

                                {{-- Submit --}}
                                <div class="form-group">
                                    <button type="reset" class="btn btn-md btn-default reset">Reset</button>
                                    <button type="submit" class="btn btn-md btn-info">Save</button>
                                </div>
                           </form>

                        </div>
                    </div>
                </div>
                <!-- /. new-user -->
                <!-- <div class="col-md-4 new-user">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">

                        {{-- @include('common.errors') --}}
                       
                           <form role="form" action="{{url('users')}}" method="post" class="new-appointment">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Family Serial No.</label>
                                    <input class="form-control" type="text" name="fam_serial_num" value="{{old('fam_serial_num')}}">
                                </div>

                                <div class="form-group  @if ($errors->has('blood_type')) has-error @endif">
                                    <label>Blood Type</label>
                                    <select class="form-control" name="blood_type">
                                        <option value="" selected></option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    @if ($errors->has('blood_type')) <small class="help-block">
                                        <strong>{{$errors->first('blood_type')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group">
                                    <label>Obstetrical History</label>
                                    <div class="form-group">
                                        <label>Number of Previous Pregnancies</label>
                                        <input class="form-control" type="text" name="prev_pregnancy">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="prev_caesarian">Previous Caesarian Section
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="rpl">3 Consecutive Miscarriages
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="stillbirth">Stillbirth
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="pph">Postparthum Hemorrhage
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Present Health Problems</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="tubercolosis">Tuberculosis ( 14 days+ of cough )
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="heart_disease">Heart Disease
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                           <input type="checkbox" value="" name="diabetes">Diabetes
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" name="bronchial_asthma">Bronchial Asthma
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" name="goiter">Goiter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" name="iodine_deficiency">Iodine Supplementation in High Risk Areas
                                        </label>
                                    </div>
                                </div>

                           </form>

                        </div>
                    </div>
                </div> -->
                <!-- /. new-user -->
            </div>
            <!-- /. ROW  -->
            
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->
            
@endsection