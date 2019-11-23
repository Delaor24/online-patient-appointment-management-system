@extends('backEnd.doctor.layout.master')
@section('title','Doctor show all Appointments')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="card">
    <div class="header">
      <h2>
        Show All Appointmetns

      </h2>

    </div>
    <div class="body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Visit Date</th>
            <th>Visit Time</th>
            <th>Disease</th>

            <th>Phone Number</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach($appointments as $appointment)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->date }}-{{ $appointment->month }}-{{ $appointment->year }}</td>
            <td> <?php
            $time = App\Time::findOrFail($appointment->visit_time); ?>
            {{ $time->time }}
          </td>
          <td>{{ $appointment->disease }}</td>

          <td>{{ $appointment->phone_number }}</td>
          <td>{{ $appointment->address }}

          </td>
          <td>{{ $appointment->status === 1 ? 'Complete' : 'Incomplete' }}</td>


          <td>

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#patient_{{$appointment->id}}">
              <i class="fa fa-eye"></i>
            </button>

            <button class="btn btn-danger btn-sm" type="button" onclick="deleteappointment({{$appointment->id}})">
              <i class="fa fa-trash"></i>
            </button>



            <form id="delete_form_{{$appointment->id}}" method="post" action="{{route('doctor.deleteAppointment',['id'=>$appointment->id])}}" style="display: none;">
              @method('DELETE')
              @csrf

            </form>
          </td>






          <!-- Button trigger modal -->


          <!-- Modal -->
          <div class="modal fade" id="patient_{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Appointment Patient</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <h4><strong>Patient Name : </strong>{{$appointment->name}}</h4>
                    <h4><strong>Visit Date: </strong>{{ $appointment->date }}-{{ $appointment->month }}-{{ $appointment->year }}</h4>
                    <h4><strong>Visit Time: </strong><?php
                    $time = App\Time::findOrFail($appointment->visit_time);
                    $day = App\Day::findOrFail($appointment->day); ?>
                    {{ $time->time }} <strong>({{ $day->day }})</strong></h4>

                    <h4><strong>Disease : </strong>{{$appointment->disease}}</h4>
                    <h4><strong>Fee : </strong>{{$appointment->doctor_fee}}</h4>

                    <h4><strong>Address : </strong>{{$appointment->address}}</h4>

                    <h4><strong>Mobile Number : </strong>{{$appointment->phone_number}}</h4>

                    <a href="{{route('doctor.updateAppointment',['id'=>$appointment->id])}}" class="btn btn-info">{{$appointment->status === 1 ? 'completed' : 'incomplete'}}</a>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
              </div>
            </div>
          </div>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection


@push('js')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<script src="https://use.fontawesome.com/3d1aefa331.js"></script>

<script type="text/javascript">
  function deleteappointment(id) {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        event.preventDefault();
        document.getElementById('delete_form_'+id).submit();
      } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                    ) {
        swal(
          'Cancelled',
          'Your data is safe :)',
          'error'
          )
      }
    })
  }
</script>
@endpush