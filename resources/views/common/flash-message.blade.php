@if(!session('error') && session('msg'))
    <div class="alert alert-success alert-dismissible text-uppercase" role="alert"">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('msg') }}
    </div>
@endif