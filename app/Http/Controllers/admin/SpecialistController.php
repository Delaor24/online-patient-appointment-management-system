<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialist;
use Brian2694\Toastr\Facades\Toastr;
class SpecialistController extends Controller
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
        $specialists = Specialist::latest()->get();

        return view('backEnd.admin.pages.specialist.index',compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.admin.pages.specialist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required']);
         
         $specialist = Specialist::create($request->all());
         if($specialist){
             Toastr::success('Admin Specialist Created Successfully done!!','success');

             return redirect()->route('specialists.index');
         }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialist = Specialist::findOrFail($id);
        return view('backEnd.admin.pages.specialist.edit',compact('specialist'));
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
        $data = $this->validate($request,['name' => 'required']);
         
         $specialist = Specialist::findOrFail($id);
         $specialist->update($data);
         if($specialist){
             Toastr::success('Admin Specialist updated Successfully!!','success');

             return redirect()->route('specialists.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialist = Specialist::findOrFail($id);
        $specialist->delete();
        Toastr::success('Admin Specialist deleted Successfully!!','success');

        return redirect()->route('specialists.index');


    }
}
