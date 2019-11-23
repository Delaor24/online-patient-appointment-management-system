<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;
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
    protected $redirectTo = '/admin/dashboard';

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
            return view('backEnd.admin.pages.auth.login');
        }

        public function login(Request $request){
            $this->validate($request,[
                'email' =>'required|email',
                'password' => 'required'
            ]);





           $admin = Admin::where('email',$request->email)->first();

          

           

            if(!$admin){
                Toastr::error('This email not match!!Your are not admin','error');

                return redirect()->route('admin.login');
            }


            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {


                // The user is being remembered...
                Toastr::success('Admin Login Successfully !!','success');
                return redirect()->route('admin.dashboard');

            }
            else{
                Toastr::error('Cradential Errro!!','error');

                return redirect()->route('admin.login');
            }





        }



        public function logout(Request $request){
            Auth::guard('admin')->logout();
            Toastr::success('Admin Logout Successfully !!','success');
            return redirect()->route('admin.login');
        }



        protected function guard(){

            return Auth::guard('admin');
        }
    }
