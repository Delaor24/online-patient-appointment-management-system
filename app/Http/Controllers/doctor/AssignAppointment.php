<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use App\Doctor;
class AssignAppointment extends Controller
{
	public function __construct(){
		return $this->middleware('auth:doctor');
	}
    public function index(){

    	$appointments = Doctor::findOrFail(Auth::id())->appointments;
    	return view('backEnd.doctor.pages.appointment.index',compact('appointments'));
    }

    public function statusUpdate($id){
    	$appointment = Appointment::findOrFail($id);

    	if ($appointment->status ===0) {
    		$appointment->status = 1;
    		$appointment->save();
    		Toastr::success('Doctor appointment complete','success');
    		return redirect()->route('doctor.appointment.index');
    		
    	}else{
    		$appointment->status = 0;
    		$appointment->save();
    		Toastr::success('Doctor appointment Incomplete','success');
    		return redirect()->route('doctor.appointment.index');
    	}
    	return view('backEnd.doctor.pages.appointment.index',compact('appointments'));
    }

    public function deleteAppointment($id){
        $appointment = Appointment::findOrFail($id);


        $appointment->delete();
        Toastr::success('Doctor appointment Deleted Successfully!!','success');

        return redirect()->route('doctor.appointment.index');
    }

    public function doctorSingleViewAppointment($id,$tittle,$a){

        foreach(Auth::user()->unreadNotifications as $appointment){
            if($appointment->id == $a){
                $appointment->markAsRead();
            }
        }

         
        $appointment = Appointment::findOrFail($id);


        return view('backEnd.doctor.pages.appointment.single-view',compact('appointment'));
    }
}
