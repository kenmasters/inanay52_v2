{{-- Modal to show add new appointment --}}
<div id="new-appointment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                <input required type="text" class="form-control" name="name" value="Prenatal Checkup">
              </div>
              <div class="form-group">
                <label for="">Date</label>
                <input  type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
              </div>
              <div class="form-group">
                <label for="">Time</label>
                <input  type="time" class="form-control" name="time" value="{{date('H:i')}}">
              </div>
              <button type="submit" class="btn btn-info">Save</button>
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>
  </div>
</div>