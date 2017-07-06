@extends('admin')

@section('title')
iNanay | App Description
@endsection

@section('content')
	
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">

                @include('common.flash-message')

                <div class="col-md-12">
                    <h1 class="page-head-line">Application Description</h1>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <p>Purpose: This application aims to help Rural Health Unit(RHU) monitor the pregnancy checkup within the community. The nurse/midwife can register new member(pregnant woman), determine her Estimated Date of Conception(EDC) basing from her Last Menstrual Period(LMP), and be able to monitor if the mother is reporting regularly for pregnancy checkup.</p>

                <p>Features:</p>
                <p>Midwife can add new pregnant member to be monitored</p>
                <p>Midwife can set regular pregnancy checkup(Appointment)</p>
                <p>Midwife can add results of regular pregnancy checkup (Appointment's Result)</p>
              </div>
            </div>
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->

    @include('forms.modal-appointment-result-dynamic')
@endsection