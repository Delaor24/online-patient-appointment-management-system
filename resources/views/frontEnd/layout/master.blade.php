
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Hospital Management System  | @yield('title')</title>




  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

  <!-- Styles -->
  <link href="{{ asset('css/css1.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

  <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/datePicker/css/bootstrap-datepicker.css')}}">


   <!-- Toastr css -->
    <link rel="stylesheet" type="text/css" href="{{asset('toastr/toastr.min.css')}}">

    @stack('css')

  <style type="text/css">
  .navbar-light{
    background-color: #40B176!important;
  }

  .dropdown-item{
    color: white!important;
  }
  .navItemColor{
    color: white!important;
  }
  .nabHober:hover{
    color: black!important;
  }



</style>
</head>
<body>
  <div id="app">



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('backEnd/images/logo.jpg')}}" style="width: 170px;height: 50px;" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">


        <ul class="navbar-nav ml-auto">

         

          <li class="nav-item active">
            <a class="nav-link navItemColor" href="{{route('frontEnd.home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
         
              <li class="nav-item dropdown">
            <a class="nav-link navItemColor dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Specialist
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #40B176!important;color: white;">

               @foreach(App\Specialist::all() as $specialist)
              <a class="dropdown-item nabHober" target="_blank" href="{{route('specialist.doctor.list',['id'=>$specialist->id])}}">{{$specialist->name}}</a>
               @endforeach
             
            </div>
          </li>
         


          <li class="nav-item">
            <a class="nav-link navItemColor" href="{{route('doctor.list')}}">Doctor List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navItemColor" href="{{route('frontEnd.contactPage')}}">Contact Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link navItemColor" href="#">About Us</a>
          </li>

       

          <li class="nav-item dropdown" style="margin-right: 60px;">
            <a class="nav-link navItemColor dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             LOGIN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #40B176!important;color: white;">
              <a class="dropdown-item nabHober" target="_blank" href="{{route('doctor.login')}}">Doctor Login</a>
              <a class="dropdown-item nabHober" target="_blank" href="{{route('admin.login')}}">Admin Login</a>
             
            </div>
          </li>
        </ul>
      </div>
    </nav>



    @yield('slider')

    <main class="py-4">
      @yield('content')
    </main>

     @include('frontEnd.layout.partial.footer')
  </div>

   <script src="{{asset('backEnd')}}/plugins/jquery/jquery.min.js"></script>

    
   <script src="{{asset('toastr/toastr.min.js')}}"></script>
   
     <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   @stack('js')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{asset('frontEnd/datePicker/js/bootstrap-datepicker.js')}}"></script>

    {!! Toastr::message() !!}
</body>
</html>
