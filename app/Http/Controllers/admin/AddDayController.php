<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Doctor;
use App\Day;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
class AddDayController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('backEnd.admin.pages.doctor.addDay',compact('doctors'));
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
            'day' =>'required',
            'doctor_id' =>'required',  

        ]);

       
        $day = new Day();

        $day->day = $request->day;
        $day->doctor_id = $request->doctor_id;
        $day->save();

        Toastr::success('Admin Doctor working day added Successfully!!','success');
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
            'day' =>'required',
          

        ]);

       
        $day = Day::findOrFail($id);

        $day->day = $request->day;
      
        $day->save();

        Toastr::success('Admin Doctor working day updated Successfully!!','success');
        return redirect()->route('doctors.show',['doctor'=>$day->doctor_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::findOrFail($id);
        $day->delete();
        return redirect()->back();
    }
}
