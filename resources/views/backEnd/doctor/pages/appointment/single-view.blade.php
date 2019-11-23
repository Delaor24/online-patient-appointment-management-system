@extends('backEnd.doctor.layout.master')
@section('title','Doctor show single appointment')

@section('content')
<div class="p-2">
	
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

		<a href="{{route('doctor.appointment.index')}}" class="btn btn-success">Back</a>
	

</div>
@endsection


