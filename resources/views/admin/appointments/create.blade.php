@extends('admin')

@section('title')
iNanay | Appointments
@endsection

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><i class="fa fa-plus"></i> New Appointment</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 new-appointment">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Appointment Details
                        </div>
                        <div class="panel-body">
                           <form role="form" action="{{url('appointments')}}" method="post" class="new-appointment">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>AOG in Months</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input class="form-control" type="datetime">
                                </div>
                                {{-- Vaginal Bleeding --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="vaginal_bleeding" value="1" /> Vaginal Bleeding
                                    </label>
                                </div>
                                {{-- / Vaginal Bleeding --}}
                                {{-- UTI --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="uti" value="1" /> Urinary Track Infection
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
                                    <input class="form-control" type="text" name="bp">
                                </div>
                                {{-- / BP --}}
                                {{-- BP >= 140/90 --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="bp140_90" value="1" /> BP 140/90 and Above
                                    </label>
                                </div>
                                {{-- / BP >= 140/90 --}}
                                {{-- Fever >= 38deg C. --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="fever_38" value="1" /> Fever 38 &deg;C and Above
                                    </label>
                                </div>
                                {{-- / Fever >= 38deg C. --}}
                                {{-- Pallor --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="pallor" value="1" /> Pallor
                                    </label>
                                </div>
                                {{-- / Pallor --}}
                                {{-- Abnormal Fundal Height --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="afh" value="1" /> Abnormal Fundal Height
                                    </label>
                                </div>
                                {{-- / Abnormal Fundal Height --}}
                                {{-- Abnormal Presentation --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="ap" value="1" /> Abnormal Presentation
                                    </label>
                                </div>
                                {{-- / Abnormal Presentation --}}
                                {{-- Edema --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="edema" value="1" /> Edema
                                    </label>
                                    
                                </div>
                                {{-- / Edema --}}
                                {{-- Vaginal Infection --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="vi" value="1" /> Vaginal infection
                                    </label>
                                </div>
                                {{-- / Vaginal Infection --}}
                                <div class="form-group">
                                    <label>Lab. Test Results <small>(e.g. HGB, URINE, VDRL)</small></label>
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
                <!-- /. new-appointment -->
                <div class="col-md-3 new-appointment">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Appointment Form
                        </div>
                        <div class="panel-body">
                           <form role="form" action="{{url('appointments')}}" method="post" class="new-appointment">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>AOG in Months</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Select Appointment Date And Time</label>
                                    <input class="form-control" type="text">
                                </div>
                                {{-- Vaginal Bleeding --}}
                                <div class="form-group">
                                    <label>Vaginal Bleeding</label>
                                    <div class="input-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="vb" value="No" checked> No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="vb" value="Yes"> Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="vaginal_bleeding" value="1" /> Vaginal Bleeding
                                    </label>
                                </div>
                                {{-- / Vaginal Bleeding --}}
                                {{-- UTI --}}
                                <div class="form-group">
                                    <label>Urinary Track Infection</label>
                                    <div class="input-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="uti" value="No" checked> No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="uti" value="Yes"> Yes
                                        </label>
                                    </div>
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
                                    <input class="form-control" type="text" name="bp">
                                </div>
                                {{-- / BP --}}
                                {{-- BP >= 140/90 --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="bp140_90" value="1" /> BP 140/90 and Above
                                    </label>
                                </div>
                                {{-- / BP >= 140/90 --}}
                                {{-- Fever >= 38deg C. --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="fever_38" value="1" /> Fever 38 &deg;C and Above
                                    </label>
                                </div>
                                {{-- / Fever >= 38deg C. --}}
                                {{-- Pallor --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="pallor" value="1" /> Pallor
                                    </label>
                                </div>
                                {{-- / Pallor --}}
                                {{-- Abnormal Fundal Height --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="afh" value="1" /> Abnormal Fundal Height
                                    </label>
                                </div>
                                {{-- / Abnormal Fundal Height --}}
                                {{-- Abnormal Presentation --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="ap" value="1" /> Abnormal Presentation
                                    </label>
                                </div>
                                {{-- / Abnormal Presentation --}}
                                {{-- Edema --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="edema" value="1" /> Edema
                                    </label>
                                    
                                </div>
                                {{-- / Edema --}}
                                {{-- Vaginal Infection --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="vi" value="1" /> Vaginal infection
                                    </label>
                                </div>
                                {{-- / Vaginal Infection --}}
                                <div class="form-group">
                                    <label>Lab. Test Results <small>(e.g. HGB, URINE, VDRL)</small></label>
                                </div>                      
                                {{-- Submit --}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info">Save</button>
                                    <button type="reset" class="btn btn-md btn-info reset">Reset</button>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                <!-- /. new-appointment -->
            </div>
            
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->
            
@endsection