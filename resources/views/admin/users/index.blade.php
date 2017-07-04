@extends('admin')

@section('title')
iNanay | Users
@endsection

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Patients Overview <a href="{{route('users.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add New Patient</a></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 filters">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Filters <a href="{{route('users.index')}}" class="pull-right text-info">Reset</a>
                        </div>
                        <div class="panel-body">
                           <form role="form" class="filter">
                               <input type="hidden" class="form-control" name="search_by" value="{{ Input::get('search_by', '') }}" />
                               <input type="hidden" class="form-control" name="s" value="{{ Input::get('s', '') }}" />
                               <input type="hidden" class="form-control" name="take" value="{{ Input::get('take') }}" />

                                <div class="form-group">
                                    {{-- <label>Date Registered</label> --}}
                                    {{-- <select class="form-control" name="month">
                                        <option value="" selected></option>
                                        @foreach($months as $i => $month)
                                        <option value="{{$i}}" {{ $i == $request->input('month') ? 'selected' : '' }}>{{$month}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                {{-- Age --}}
                                <div class="form-group">
                                    <label class="control-label">Age Range</label>
                                    <div class="input-group">
                                        <input type="number" min="10" class="form-control" name="filter_age_min" value="{{ Input::get('filter_age_min') }}" placeholder="10" />
                                        <span class="input-group-addon">to</span>
                                        <input type="number" min="10" class="form-control" name="filter_age_max" value="{{ Input::get('filter_age_max') }}" placeholder="120" />
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Age Range</label>
                                    <input class="form-control" type="text"  placeholder="Min">
                                    <input class="form-control" type="text"  placeholder="Max">
                                </div> --}}
                               {{--  <div class="form-group">
                                    <label>EDC by Month</label>
                                    <select class="form-control" name="month">
                                        <option value="" selected></option>
                                        @foreach($months as $i => $month)
                                        <option value="{{$month}}" {{ $month == $request->input('month') ? 'selected' : '' }}>{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="active">
                                        <option value=""></option>
                                        <option value="1" {{ '1' == Input::get('active') ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ '0' == Input::get('active') ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="text">
                                </div> --}}

                                {{-- Submit --}}
                                <div class="form-group">
                                    <button type="reset" class="btn btn-md btn-default reset">Clear</button>
                                    <button type="submit" class="btn btn-md btn-info">Search</button>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>
                <!-- /. filters -->

                <div class="col-md-9 users-list">
                    <div class="panel panel-info">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 data-table-filters">
                                    <div class="pull-left dataTables_length">
                                        <form action="">
                                        <label>Show 
                                            <select name="take" onchange="this.form.submit()">
                                                <option value="10" {{ 10 == Input::get('take') ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ 25 == Input::get('take') ? 'selected' : '' }}>25</option>
                                                <option value="50" {{ 50 == Input::get('take') ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ 100 == Input::get('take') ? 'selected' : '' }}>100</option>
                                            </select> entries
                                        </label>
                                        </form>
                                    </div>
                                    <div class="pull-right dataTables_filter">
                                        <form action="">
                                            <label>Search:
                                                <input name="s" value="{{ $request->get('s', '') }}" type="search" placeholder="Firstname / Lastname" aria-controls="data-table">
                                            </label>
                                            {{-- <label class="dataTables_length">Search by:
                                                <select name="search_by" class="" aria-controls="data-table">
                                                    <option value="title">Title</option>
                                                </select>
                                            </label> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date Registered</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>DOB</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($users) && $users->count())
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->created_at->format('M j, Y')}}</td>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{isset($user->dob) && $user->dob ? $user->dob->format('M j, Y') : ''}}</td>
                                                <td>{{$user->getAge()}}</td>
                                                <td>{{$user->active ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', ['id'=>$user->id]) }}" class="btn btn-info btn-xs" style="margin-bottom:5px;"><i class="fa fa-edit"></i> Edit </a>&nbsp;
                                                    <a href="{{ route('users.show', ['id'=>$user->id]) }}" class="btn btn-info btn-xs" style="margin-bottom:5px;"><i class="fa fa-edit"></i> View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                         <tr><td colspan="7" class="text-center text-uppercase">no records found</td></tr>
                                    @endif
                                    </tbody>
                                </table>
                                {{-- @if( isset($users) && $users->count() )
                                    {!! $users->render() !!}
                                @endif --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 data-table-filters">
                                    <div class="pull-left dataTables_length">
                                        {{-- <label>Showing 1 - 10 of 50 entries</label> --}}
                                    </div>
                                    <div class="pull-right dataTables_pagination">
                                        @if( isset($users) && $users->count() )
                                            {!! $users->render() !!}
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
@endsection