<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct(){
		return $this->middleware('auth:doctor');
	}
    public function index(){
    	return view('backEnd.doctor.pages.dashboard');
    }
}
