<?php

namespace App\Http\Controllers\doctor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Doctor;
use Illuminate\Http\Request;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/doctor/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
        public function showLoginForm()
        {
            return view('backEnd.doctor.pages.auth.login');
        }



        public function login(Request $request){
            $this->validate($request,[
                'email' =>'required|email',
                'password' => 'required'
            ]);




            $doctor = Doctor::where('email',$request->email)->first();

          

           

            if(!$doctor){
                Toastr::error('This email not match!!Your are not doctor','error');

                return redirect()->route('doctor.login');
            }






            if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

             


                // The user is being remembered...
                Toastr::success('Doctor Login Successfully !!','success');
                return redirect()->route('doctor.dashboard');

            }
            else{
                Toastr::error('Cradential Errro!!','error');

                return redirect()->route('doctor.login');
            }





        }


   



        public function logout(Request $request){
            Auth::guard('doctor')->logout();
            Toastr::success('Doctor Logout Successfully !!','success');
            return redirect()->route('doctor.login');
        }



        protected function guard(){

            return Auth::guard('doctor');
        }
    }
