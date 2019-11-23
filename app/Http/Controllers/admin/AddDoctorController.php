<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Doctor;
use App\Specialist;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class AddDoctorController extends Controller
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
        $doctors = Doctor::all();
        $specialists = Specialist::all();

        return view('backEnd.admin.pages.doctor.index',compact('doctors','specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialists = Specialist::all();
        return view('backEnd.admin.pages.doctor.create',compact('specialists'));
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
            'degree' =>'required',
            'specialist_id' =>'required',
            'email' =>'required|unique:doctors',
            'phone_number' =>'required|unique:doctors',
            'address' =>'required'

        ]);

        $image = $request->file('avatar');

        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }
            $postImage = Image::make($image)->resize(600,600)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);
        } else {
            $imageName = NULL;
        }

        $doctor = new Doctor();

        $doctor->name = $request->name;
        $doctor->degree = $request->degree;
        $doctor->specialist_id = $request->specialist_id;
        $doctor->email = $request->email;
        $doctor->phone_number = $request->phone_number;
        $doctor->address = $request->address;

        $doctor->day = $request->day;
        $doctor->start_time = $request->start_time;
        $doctor->end_time = $request->end_time;
        $doctor->avatar = $imageName;
        $doctor->password = Hash::make('123456');
        $doctor->save();

        Toastr::success('Doctor Added Successfully!!','success');
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('backEnd.admin.pages.doctor.single-view',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);


        return view('backEnd.admin.pages.doctor.edit',compact('doctor'));
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

        ]);

        $doctor = Doctor::findOrFail($id);
        $image = $request->file('avatar');

        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }

            if(Storage::disk('public')->exists('profile/'.$doctor->avatar)){
                Storage::disk('public')->delete('profile/'.$doctor->avatar);
            }
            
            $postImage = Image::make($image)->resize(600,600)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);
        } else {
            $imageName = $doctor->avatar;
        }






        $doctor->name = $request->name;
        $doctor->day = $request->day;
        $doctor->start_time = $request->start_time;
        $doctor->end_time = $request->end_time;
        $doctor->avatar = $imageName;
        $doctor->save();

        Toastr::success('Admin doctor Updated Successfully done!!','success');

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        if(Storage::disk('public')->exists('profile/'.$doctor->avatar)){
            Storage::disk('public')->delete('profile/'.$doctor->avatar);
        }

        $doctor->delete();
        Toastr::success('Admin doctor Deleted Successfully!!','success');

        return redirect()->route('doctors.index');
    }
}
