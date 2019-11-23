      <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->

        <div class="user-info">
            <div class="image">
                <img src="@if(isset(Auth::user()->avatar)){{Storage::disk('public')->url('profile/'.Auth::user()->avatar)}}@else {{asset('backEnd/profile/profile.jpg')}}@endif" width="48" height="48" alt="User"/>
            </div>
            
            <div class="info-container">

                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('admin.profile')}}"><i class="material-icons">person</i>Profile</a></li>


                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{Request::is('admin/specialists*') ? 'active' : ''}}">
               <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">view_list</i>
                <span>specialist</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{route('specialists.create')}}">Specialist create</a>
                </li>
                <li>
                    <a href="{{route('specialists.index')}}">Specialist all</a>
                </li>

            </ul>
        </li>

  

    @if(Auth::user()->type == 'admin')
    <li class="{{Request::is('admin/doctors*') ? 'active' : ''}}">
           <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">view_list</i>
            <span>Doctors</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{route('doctors.create')}}">Add Doctor</a>
            </li>
            <li>
                <a href="{{route('doctors.index')}}">View Doctor List</a>
            </li>

            <li>
                <a href="{{route('doctordays.create')}}">Add Doctor Working Day</a>
            </li>

            <li>
                <a href="{{route('doctortimes.create')}}">Add Doctor Visit Time</a>
            </li>

        </ul>
    </li>

    @endif

        <li class="{{Request::is('admin/appointments*') ? 'active' : ''}}">
           <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">view_list</i>
            <span>Appointments</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{route('appointments.create')}}">Add New Appointment</a>
            </li>
            <li>
                <a href="{{route('appointments.index')}}">View Appointment List</a>
            </li>

        </ul>
    </li>


          <li class="{{Request::is('admin/staffs*') ? 'active' : ''}}">
           <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">view_list</i>
            <span>Staffs</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{route('staffs.create')}}">Staff create</a>
            </li>
            <li>
                <a href="{{route('staffs.index')}}">Staff all</a>
            </li>

        </ul>
    </li>


          <li class="{{Request::is('admin/contact*') ? 'active' : ''}}">
           <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">view_list</i>
            <span>Incomming Mail</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{route('admin.contactUs')}}">Contact Lists</a>
            </li>
         

        </ul>
    </li>


    <li class="{{Request::is('admin/setting*') ? 'active' : ''}}">
       <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">view_list</i>
        <span>Setting</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a href="{{route('admin.profile')}}">Profile</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="material-icons">input</i>Sign Out
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>



    </li>

</ul>
</li>



</ul>
</div>
<!-- #Menu -->
<!-- Footer -->
<div class="legal">
    <div class="copyright">
        &copy; <?php echo date('Y') ?> <a href="javascript:void(0);">Material Design</a>.
    </div>
    <div class="version">
        <b>Version: </b> 1.0.5
    </div>
</div>
<!-- #Footer -->
</aside>