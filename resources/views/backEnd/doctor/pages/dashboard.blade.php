@extends('backEnd.doctor.layout.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <a href="{{route('doctor.appointment.index')}}"  style="cursor:pointer">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">My Patients</div>
                        <div class="number count-to" data-from="0" data-to="{{count(App\Doctor::findOrFail(Auth::id())->appointments)}}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </a>




</div>
@endsection