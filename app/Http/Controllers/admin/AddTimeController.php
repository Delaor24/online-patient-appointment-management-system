<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Doctor;
use App\Day;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Time;
class AddTimeController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $days = Day::all();
        return view('backEnd.admin.pages.doctor.addTime',compact('doctors','days'));
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
            'time' =>'required',
            'doctor_id' =>'required',
            'day_id' =>'required'  

        ]);

       
        $day = new Time();

        $day->time = $request->time;
        $day->doctor_id = $request->doctor_id;
        $day->day_id = $request->day_id;
        $day->save();

        Toastr::success('Admin Doctor Added Visit Time!!','success');
         return redirect()->route('doctors.show',['doctor'=>$request->doctor_id]);
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
        //
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
            'time' =>'required',

        ]);

       
        $time = Time::findOrFail($id);

        $time->time = $request->time;
        $time->save();

        Toastr::success('Admin Updated Doctor Visit Time!!','success');
         return redirect()->route('doctors.show',['doctor'=>$time->doctor_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::findOrFail($id);
        $time->delete();
        return redirect()->back();
    }
}
