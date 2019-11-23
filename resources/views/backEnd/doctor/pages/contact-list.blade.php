@extends('backEnd.admin.layout.master')
@section('title','show all contact-list')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Show All Contact List

            </h2>

        </div>

        @if(count($contacts) > 0)
        <div class="body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Message</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                  <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>



                    <td>

                       <button class="btn btn-danger btn-sm" type="button" onclick="deletecontact({{$contact->id}})">
                          <i class="fa fa-trash"></i>

                      </button>



                      <form id="delete_form_{{$contact->id}}" method="post" action="{{route('admin.contact.destroy',['id'=>$contact->id])}}" style="display: none;">
                          @method('DELETE')
                          @csrf

                      </form>
                  </td>

              </tr>
              @endforeach
          </tbody>
      </table>
  </div>



  @else
   <h3 class="text-center text-danger" >No comment yet!!</h3>
  @endif
</div>
</div>
@endsection


@push('js')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<script src="https://use.fontawesome.com/3d1aefa331.js"></script>

<script type="text/javascript">
    function deletecontact(id) {
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