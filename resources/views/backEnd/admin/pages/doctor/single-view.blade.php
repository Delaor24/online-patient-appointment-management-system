@extends('backEnd.admin.layout.master')
@section('title','show all specialists')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


 <div class="card">
    <div class="header">
        <h2>
         <strong>Doctor : </strong> {{$doctor->name}}

     </h2>
     <ul class="header-dropdown m-r--5">
        <li class="dropdown">
         <a href="{{route('doctors.index')}}" class="btn btn-info">All Doctors</a>
     </li>
 </ul>
</div>
<div class="body table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>

                <th>Name</th>
                <th>Specialist</th>
                <th>phone</th>
                <th>Working day</th>
                <th>Start Time</th>
                <th>End Time</th>


            </tr>
        </thead>
        <tbody>

            <tr>

                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialist->name }}</td>
                <td>{{ $doctor->phone_number }}</td>
                <td>{{ $doctor->day }}</td>
                <td>{{ $doctor->start_time }}</td>
                <td>{{ $doctor->end_time }}</td>



            </tr>

        </tbody>
    </table>
</div>
</div>





<div class="card">
    <div class="header">
        <h2>
         <strong>Doctor : Visit days</strong>

     </h2>

           <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   <a href="{{route('doctordays.create')}}" class="btn btn-info">Add Day</a>
                                </li>
                            </ul>

 </div>
 <div class="body table-responsive">
    <table class="table table-hover">
        <thead>

            <tr>

                <th>Days</th>
                <th>Action</th>
                


            </tr>

        </thead>
        <tbody>
         @foreach($doctor->days as $day)
         <tr>

            <td>{{ $day->day }}</td>
            <td>


               
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#doctorDay_{{$day->id}}">
              <i class="fa fa-edit"></i>
            </button>


                <button class="btn btn-danger btn-sm" type="button" onclick="deleteDay({{$day->id}})">
                  <i class="fa fa-trash"></i>
              </button>



              <form id="delete_form_{{$day->id}}" method="post" action="{{route('doctordays.destroy',['doctorday'=>$day->id])}}" style="display: none;">
                @method('DELETE')
                @csrf

            </form>
        </td>


        <div class="modal fade" id="doctorDay_{{$day->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Doctor Visit Day</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                   <form method="POST" action="{{route('doctordays.update',['doctorday'=>$day->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control @error('day') is-invalid @enderror" name="day" placeholder="Day" value="{{$day->day}}">
                                    @error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

            

                 

                    <div class="form-group">
                            <div class="form-line">
                                

                                
                            </div>
                        </div>



                

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-5">Update Doctor Visit Day</button>
                        </div>
                    </div>
                </form>

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



<div class="card">
    <div class="header">
        <h2>
         <strong>Doctor : Visit Times</strong>

     </h2>

         <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   <a href="{{route('doctortimes.create')}}" class="btn btn-info">Add Time</a>
                                </li>
                            </ul>

 </div>
 <div class="body table-responsive">
    <table class="table table-hover">
        <thead>

            <tr>

                <th>Times</th>
                <th>Action</th>
                


            </tr>

        </thead>
        <tbody>
         @foreach($doctor->times as $time)
         <tr>

            <td>{{ $time->time }}</td>

            <td>


              

                 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#doctorTime_{{$time->id}}">
              <i class="fa fa-edit"></i>
            </button>


                <button class="btn btn-danger btn-sm" type="button" onclick="deleteTime({{$time->id}})">
                  <i class="fa fa-trash"></i>
              </button>



              <form id="delete_form_{{$time->id}}" method="post" action="{{route('doctortimes.destroy',['doctortime'=>$time->id])}}" style="display: none;">
                @method('DELETE')
                @csrf

            </form>
        </td>

          <div class="modal fade" id="doctorTime_{{$time->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Doctor Visit Time</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    
                         <form method="POST" action="{{route('doctortimes.update',['doctortime'=>$time->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="time" value="{{$time->time}}">
                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

            

                 

                    <div class="form-group">
                            <div class="form-line">
                                

                                
                            </div>
                        </div>



                

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-5">Update Doctor Visit Time</button>
                        </div>
                    </div>
                </form>

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
    function deleteDay(id) {
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




     function deleteTime(id) {
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