<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
class StaffController extends Controller
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
        $staffs = Staff::latest()->get();
        return view('backEnd.admin.pages.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.admin.pages.staff.create');
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
            'name' => 'required',
            'service_name' =>'required',
            'address' => 'required',
            'phone_number' => 'required',

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

   


         
         $staff = new Staff();
         $staff->name = $request->name;
         $staff->service_name = $request->service_name;
         $staff->address = $request->address;
         $staff->phone_number = $request->phone_number;
         $staff->day = $request->day;
         $staff->start_time = $request->start_time;
         $staff->end_time = $request->end_time;
         $staff->avatar = $imageName;
         $staff->save();

         Toastr::success('Admin Staff Created Successfully done!!','success');

         return redirect()->route('staffs.index');
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('backEnd.admin.pages.staff.edit',compact('staff'));
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

        $staff = Staff::findOrFail($id);
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
               //delete old image
            if(Storage::disk('public')->exists('profile/'.$staff->avatar)){
            Storage::disk('public')->delete('profile/'.$staff->avatar);

            
        }
            $postImage = Image::make($image)->resize(600,600)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);
        } else {
            $imageName = $staff->avatar;
        }

   


         
         
         $staff->name = $request->name;
         $staff->day = $request->day;
         $staff->start_time = $request->start_time;
         $staff->end_time = $request->end_time;
         $staff->avatar = $imageName;
         $staff->save();

         Toastr::success('Admin Staff Updated Successfully done!!','success');

         return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        if(Storage::disk('public')->exists('profile/'.$staff->avatar)){
            Storage::disk('public')->delete('profile/'.$staff->avatar);
        }

        $staff->delete();
        Toastr::success('Admin Staff Deleted Successfully!!','success');

       return redirect()->route('staffs.index');

    }




}
