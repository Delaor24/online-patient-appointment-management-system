<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct(){
		return $this->middleware('auth:admin');
	}
    public function index(){
    	return view('backEnd.admin.pages.dashboard');
    }
}
