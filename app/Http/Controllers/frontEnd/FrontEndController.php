<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Specialist;
use App\Contact;
use App\Appointment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Notifications\AppointNotificationDoctor;
use Brian2694\Toastr\Facades\Toastr;
class FrontEndController extends Controller
{
    public function index(){

    	$doctors = Doctor::latest()->paginate(4);

    	return view('index',compact('doctors'));
    }

     public function doctorSinglePage($id){

     	$doctor = Doctor::findOrFail($id);

    	

    	return view('frontEnd.pages.doctor-single-page',compact('doctor'));
    }

    public function doctorList(){

     	$doctors = Doctor::All();
    	

    	return view('frontEnd.pages.all-doctor-list',compact('doctors'));
    }

    public function specialistDoctorList($id){
        $specialist = Specialist::findOrFail($id);
        $doctors = $specialist->doctors;

        return view('frontEnd.pages.specialist-doctor-list',compact('doctors','specialist'));
    }

    public function contactPage(){
        

        return view('frontEnd.pages.contact-page');
    }




    public function contactUsStore(Request $r){
        $this->validate($r,[
            'name' => 'required',
            'email'=> 'required|email',
            'message' => 'required',
            'address' => 'required',
        ]);


        $contact = Contact::create($r->all());

        
        Toastr::success('Your message send successfully !!','success');
        return redirect()->route('frontEnd.contactPage');

    }

    public function appointmentStore(Request $request){
          $this->validate($request,[
            'name' =>'required',
            'disease' =>'required',
            'visit_time' =>'required',
            'doctor_id' =>'required',
            'doctor_fee' =>'required',
            'phone_number' =>'required',
            'address' =>'required',
            'day' =>'required',
            'date' =>'required',
            'month' =>'required',
            'year' =>'required',
            
        ]);






        


        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->disease = $request->disease;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->visit_time = $request->visit_time;
        $appointment->date = $request->date;
        $appointment->day = $request->day;
        $appointment->month = $request->month;
        $appointment->year = $request->year;
        $appointment->phone_number = $request->phone_number;
        $appointment->address = $request->address;
        $appointment->doctor_fee = $request->doctor_fee;
        $appointment->doctor_fee_due = $request->doctor_fee_due;


        $appointments = Appointment::where('doctor_id',$request->doctor_id)->where('status',0)->get();

       
        

        $appointmentId = [];

        foreach ($appointments as $appointmentInfo) {
            $appointmentId[] = $appointmentInfo->id;
        }

        

        $appointmentStore = Appointment::whereIn('id',$appointmentId)->where('date',$request->date)->where('day',$request->day)->where('month',$request->month)->where('year',$request->year)->where('visit_time',$request->visit_time)->get();
        

        if(count($appointmentStore) > 0){
            Toastr::error('This Time someone booked!! Please another time select','error');
            return redirect()->back();
        }
        

        $appointment->save();

       

        $doctorId = $appointment->doctor_id;

        $doctor = Doctor::findOrFail($doctorId);

        $doctor->notify(new AppointNotificationDoctor($appointment,$doctorId));

        Toastr::success('appointment send Successfully!!','success');
        return redirect()->back();
        

    }
    public function appointmentCreate($id,$title){
        
        $doctorSelect = Doctor::findOrFail($id);
        return view('frontEnd.pages.appointment.create',compact('doctorSelect'));
    }
}
