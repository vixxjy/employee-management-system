<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Designation;
use Session;

class DesignationController extends Controller
{
     public function index(Request $request){
     $designation = Designation::all();
      return view('designation.index', ['designations' => $designation])->with('i', ($request->input('page', 1) - 1) * 5);
   }
  
    public function store(Request $request)
    {
          $this->validate($request, [
            'designation' => 'required|string'

        ]); 

        $designation = new Designation();
        $designation->designation = $request->designation;
        $designation->designation_code = $this->designationCode();
        
        $designation->save();

        Session::flash('flash_message', 'Designation was successfully added!');

        return back();
    }
  
    public function designationCode(){
        
      $lastUnique = Designation::orderBy('id', 'desc')->pluck('id')->first();
      return $lastUnique + 101;
    }
  
    public function updatedDesignationCode(){
        
      $lastUnique = Designation::orderBy('id', 'desc')->pluck('id')->first();
      return $lastUnique + 101 - 1;
    }
  
    public function edit($id)
    {
        $designations = Designation::find($id);
        return view('designation.edit', ['designations' => $designations]);
    }
  
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'designation' => 'required',
        ]);
      
        $designation = Designation::findOrFail($id);
        
       $designation->designation = $request->designation;
       $designation->designation_code = $this->updatedDesignationCode();
        
       $designation->save();
        Session::flash('flash_message', 'Designation was successfully Updated!');
        return redirect()->route('designation');
    }
  
    public function destroy($id)
    {
         Designation::find($id)->delete($id);

        return back()->with('flash_message','Designation was deleted successfully');
    }
  
  
}
