<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use Session;

class DepartmentController extends Controller
{
   public function index(Request $request){
     $department = Department::all();
      return view('department.index', ['departments' => $department])->with('i', ($request->input('page', 1) - 1) * 5);
   }
  
    public function store(Request $request)
    {
          $this->validate($request, [
            'dept_name' => 'required|string'

        ]); 

        $department = new Department();
        $department->dept_name = $request->dept_name;
        $department->dept_code = $this->uniqCode();
        
        $department->save();

        Session::flash('flash_message', 'Department was successfully added!');

        return back();
    }
  
    public function uniqCode(){
        
      $lastUnique = Department::orderBy('id', 'desc')->pluck('id')->first();
      return $lastUnique + 101;
    }
  
    public function updatedUniqueCode(){
        
      $lastUnique = Department::orderBy('id', 'desc')->pluck('id')->first();
      return $lastUnique + 101 - 1;
    }
    public function edit($id)
    {
        $departments = Department::find($id);
        return view('department.edit', ['departments' => $departments]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dept_name' => 'required',
        ]);
      
        $department = Department::findOrFail($id);
        
        $department->dept_name = $request->dept_name;
        $department->dept_code = $this->updatedUniqueCode();
        
        $department->save();
        Session::flash('flash_message', 'Department was successfully Updated!');
        return redirect()->route('department');
    }
  
   public function destroy($id)
    {
         Department::find($id)->delete($id);

        return back()->with('flash_message','Department was deleted successfully');
    }
}
