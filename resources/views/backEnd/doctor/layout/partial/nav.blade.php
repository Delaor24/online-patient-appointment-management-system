 <nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('doctor.dashboard')}}"><strong>Online Patient Management</strong></a>
        </div>

        @if(Auth::check())

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">{{count(Auth::user()->unreadNotifications)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>


                        <li class="body">
                            <ul class="menu">

                             @foreach(Auth::user()->unreadNotifications as $appointment)

                             <?php
                             $appointmentId = $appointment->data['appointmentId'];
                             $appointmentInfo = App\Appointment::findOrFail($appointmentId);

                            
                             ?>
                             <li style="list-style: none;">
                                <a href="{{route('doctor.view.appointment',['id'=>$appointmentId,'title'=>$appointmentInfo->name,'a'=>$appointment->id])}}">
                                    <div class="icon-circle bg-light-green">
                                        <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>{{$appointment->data['appointment']}}</h4>
                                        <p>
                                            <i class="material-icons">access_time</i> {{$appointment->created_at->diffForHumans()}}
                                        </p>
                                    </div>
                                </a>
                            </li>

                            @endforeach



                        </ul>
                    </li>
                    <li class="footer">
                        <a href="javascript:void(0);">View All Notifications</a>
                    </li>
                </ul>
            </li>
            <!-- #END# Notifications -->


        </ul>
    </div>

    @endif
</div>
</nav>