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
              	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae labore eos repellat expedita, ipsum? Ducimus libero harum dicta consectetur. Minima expedita deleniti illum laudantium nemo molestias tempora cupiditate qui quos.</p>
              </div>
            </div>
        </div>
        <!-- /# page-inner -->
    </div>
    <!-- /# page-wrapper -->

    @include('forms.modal-appointment-result-dynamic')
@endsection