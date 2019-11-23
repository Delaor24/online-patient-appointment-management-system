<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Doctor;
use App\Specialist;
use App\Appointment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Notifications\AppointNotificationDoctor;
class AppointmentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
       

        return view('backEnd.admin.pages.appointment.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();

        return view('backEnd.admin.pages.appointment.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'disease' =>'required',
            'visit_time' =>'required',
            'doctor_id' =>'required',
            'doctor_fee' =>'required',
            'phone_number' =>'required',
            'address' =>'required',
            'visit_day' =>'required',
            
        ]);




        


        $appointment = new Appointment();

        $appointment->name = $request->name;
        $appointment->disease = $request->disease;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->visit_time = $request->visit_time;
        $appointment->visit_day = $request->visit_day;
        $appointment->phone_number = $request->phone_number;
        $appointment->address = $request->address;
        $appointment->doctor_fee = $request->doctor_fee;
        $appointment->doctor_fee_due = $request->doctor_fee_due;


        $appointments = Appointment::where('doctor_id',$request->doctor_id)->where('status',0)->get();

       
        

        $appointmentId = [];

        foreach ($appointments as $appointmentInfo) {
            $appointmentId[] = $appointmentInfo->id;
        }

        

        $appointmentStore = Appointment::whereIn('id',$appointmentId)->where('visit_day',$request->visit_day)->where('visit_time',$request->visit_time)->get();
        

        if(count($appointmentStore) > 0){
            Toastr::error('This Time someone booked!! Please another time select','error');
            return redirect()->back();
        }
        

        $appointment->save();

       

        $doctorId = $appointment->doctor_id;

        $doctor = Doctor::findOrFail($doctorId);

        $doctor->notify(new AppointNotificationDoctor($appointment,$doctorId));

    
        Toastr::success('Admin appointment Created Successfully done!!','success');

        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = Doctor::all();
        $appointment = Appointment::findOrFail($id);


        return view('backEnd.admin.pages.appointment.edit',compact('appointment','doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'doctor_fee' =>'required'
           

        ]);

        $appointment = Appointment::findOrFail($id);
       
        $appointment->name = $request->name;
       
        $appointment->doctor_fee = $request->doctor_fee;
        $appointment->doctor_fee_due = $request->doctor_fee_due;
        $appointment->save();

        $name = $appointment->name;

        $doctorId = $appointment->doctor_id;

        $doctor = Doctor::findOrFail($doctor_id);

        $doctor->notify(new AppointNotificationDoctor($appointment,$name,$doctorId));

        Toastr::success('Admin appointment Updated Successfully done!!','success');

        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);


        $appointment->delete();
        Toastr::success('Admin appointment Deleted Successfully!!','success');

        return redirect()->route('appointments.index');
    }
}
