<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use App\Contact;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    
    public function profile(){
        $admin = Admin::findOrFail(Auth::id());
    	return view('backEnd.admin.pages.setting.profile',compact('admin'));
    }

    public function update(Request $request){



        $admin = Admin::findOrFail(Auth::id());
        $admin->name = $request->name;

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
             if(Storage::disk('public')->exists('profile/'.$admin->avatar)){
                Storage::disk('public')->delete('profile/'.$admin->avatar);
              }

            $postImage = Image::make($image)->resize(600,600)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);
        } else {
            $imageName = $admin->avatar;
        }

        $admin->avatar = $imageName;
        $admin->save();
        Toastr::success('Admin updated profile','success');

        return redirect()->route('admin.profile');
    }

    public function changePassword(Request $request){
    	
    	   $this->validate($request,[
            'oldPassword'=>'required',
            'password'=>'required|confirmed'

        ]);

        $hashPassword = Auth::user()->password;
        if(hash::check($request->oldPassword,$hashPassword)){
            if(!hash::check($request->password,$hashPassword)){
                $user = Admin::find(Auth::id());
                $user->password = hash::make($request->password);
                $user->save();
                Toastr::success('Admin Change password successfully done :','success');
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login');
            }
            else{
                Toastr::error('New password can not same old password :','error');
                return redirect()->route('admin.profile');
            }
        }
        else{
            Toastr::error('Current password not match :','error');
                return redirect()->route('admin.profile');
        }
    }

    public function contactUs(){

        $contacts = Contact::latest()->get();
        return view('backEnd.admin.pages.contact-list',compact('contacts'));
    }
    public function commentDelete($id){

        Contact::findOrFail($id)->delete();
        Toastr::success('Admin comment deleted','success');

        return redirect()->route('admin.contactUs');
    }
}

