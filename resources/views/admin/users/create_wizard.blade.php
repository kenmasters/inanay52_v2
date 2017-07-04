@extends('admin')

@section('title')
iNanay | Users
@endsection

@section('content')
                            
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><i class="fa fa-plus"></i> New User</h1>
                    <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">Registration</div>

        <div class="panel-body">


        <form role="form" action="{{url('users')}}" method="post" class="new-appointment">
            <div id="wizardV">
                <h2>Personal Details</h2>
                <section>
                                {{ csrf_field() }}
                    <div class="form-group @if ($errors->has('firstname')) has-error @endif">
                        <label class="control-label">First Name</label>
                        <input class="form-control" type="text" name="firstname" value="{{old('firstname')}}">
                        @if ($errors->has('firstname')) <small class="help-block">
                            <strong>{{$errors->first('firstname')}}</strong>
                        </small>@endif
                    </div>

                     <div class="form-group @if ($errors->has('lastname')) has-error @endif">
                        <label class="control-label">Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="{{old('lastname')}}">
                        @if ($errors->has('lastname')) <small class="help-block">
                            <strong>{{$errors->first('lastname')}}</strong>
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
                        <input class="form-control" type="date" name="dob" value="{{old('dob')}}">
                        @if ($errors->has('dob')) <small class="help-block">
                            <strong>{{$errors->first('dob')}}</strong>
                        </small>@endif
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" value="{{old('address')}}">
                    </div>

                    <div class="form-group">
                        <label>Family Serial No.</label>
                        <input class="form-control" type="text" name="fam_serial_num" value="{{old('fam_serial_num')}}">
                    </div>
                </section>

                <h2>Medical History</h2>
                <section>
                <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque. 
                In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum 
                dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur. 
                In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam. 
                Donec non pulvinar urna. Aliquam id velit lacus.</p>
                </section>

                <h2>Appointment Details</h2>
                <section>
                <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                venenatis.</p>
                </section>

                <h2>Appointment Action</h2>
                <section>
                <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                </section>

                <h2>Done</h2>
                <section>
                <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                </section>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- /. ROW  -->


            <div class="row">
                <div class="col-md-8 new-user">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           User Details
                        </div>
                        <div class="panel-body">

                        {{-- @include('common.errors') --}}
                       
                           <form role="form" action="{{url('users')}}" method="post" class="new-appointment">
                                {{ csrf_field() }}

                                <div class="form-group @if ($errors->has('firstname')) has-error @endif">
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" type="text" name="firstname" value="{{old('firstname')}}">
                                    @if ($errors->has('firstname')) <small class="help-block">
                                        <strong>{{$errors->first('firstname')}}</strong>
                                    </small>@endif
                                </div>

                                 <div class="form-group @if ($errors->has('lastname')) has-error @endif">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" value="{{old('lastname')}}">
                                    @if ($errors->has('lastname')) <small class="help-block">
                                        <strong>{{$errors->first('lastname')}}</strong>
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
                                    <input class="form-control" type="date" name="dob" value="{{old('dob')}}">
                                    @if ($errors->has('dob')) <small class="help-block">
                                        <strong>{{$errors->first('dob')}}</strong>
                                    </small>@endif
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address" value="{{old('address')}}">
                                </div>

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

                                <!--
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
                                -->

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
                <div class="col-md-4 new-user">
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
                </div>
                <!-- /. new-user -->
            </div>
            <!-- /. ROW  -->
            
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->
            
@endsection