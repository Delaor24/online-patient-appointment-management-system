<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use App\Doctor;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:doctor');
    }
    
    public function profile(){
        $doctor = Doctor::findOrFail(Auth::id());
    	return view('backEnd.doctor.pages.setting.profile',compact('doctor'));
    }

    public function update(Request $request){



        $doctor = Doctor::findOrFail(Auth::id());
        $doctor->name = $request->name;

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
              //old imag delete
             if(Storage::disk('public')->exists('profile/'.$doctor->avatar)){
                Storage::disk('public')->delete('profile/'.$doctor->avatar);
              }

            $postImage = Image::make($image)->resize(600,600)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);
        } else {
            $imageName = $doctor->avatar;
        }

        $doctor->avatar = $imageName;
        $doctor->aboutMe = $request->aboutMe;
        $doctor->save();
        Toastr::success('doctor updated profile','success');

        return redirect()->route('doctor.profile');
    }

    public function changePassword(Request $request){
    	
    	   $this->validate($request,[
            'oldPassword'=>'required',
            'password'=>'required|confirmed'

        ]);

        $hashPassword = Auth::user()->password;
        if(hash::check($request->oldPassword,$hashPassword)){
            if(!hash::check($request->password,$hashPassword)){
                $user = Doctor::find(Auth::id());
                $user->password = hash::make($request->password);
                $user->save();
                Toastr::success('doctor Change password successfully done :','success');
                Auth::guard('doctor')->logout();
                return redirect()->route('doctor.login');
            }
            else{
                Toastr::error('New password can not same old password :','error');
                return redirect()->route('doctor.profile');
            }
        }
        else{
            Toastr::error('Current password not match :','error');
                return redirect()->route('doctor.profile');
        }
    }



}

