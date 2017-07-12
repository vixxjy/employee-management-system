<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Designation;
use App\Department;
use App\Attendence;
use App\User;
use Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
      $attendances = Attendence::all();
      $designation = Designation::all();
      $department = Department::all();
      $employee = User::all();
      return view('attendance.index', ['attendances' => $attendances, 'designations' => $designation, 'departments' => $department, 'employees' => $employee])->with('i', ($request->input('page', 1) - 1) * 5);
    }
  
    public function create()
    { 
      $attendance = Attendence::where('user_id' == Auth::user()->id);
      
      $designation = Designation::all();
      $department = Department::all();
//       $employee = $attendance->employee;
//  
      return view('attendance.create', ['designations' => $designation, 'departments' => $department, 'attendance' => $attendance]);
    }
  
     public function store(Request $request)
    {
         $this->validate($request, [
            'department' => 'required',
            'designation' => 'required',

        ]); 

        $attendance = new Attendence();
        
  
        $attendance->user_id = Auth::user()->id;
        $attendance->attendance_id = $this->getAttendanceCode();
//         $attendance->employee_id = strtoupper(str_random(10));
        $attendance->department_id = $request->department;
        $attendance->designation_id = $request->designation;
     
        $attendance->status = "Signed In";
        
        $attendance->save();
        
//         $mailer->sendLeaveInfo(Auth::user(), $LeaveApp);
//         Session::flash('flash_message', 'Application was successfully Sent!');

        return back()->with('flash_message','Your sign in attendance was successful');
    }
  
    public function getAttendanceCode(){
       $lastCode = Attendence::orderBy('created_at', 'desc')->first();

      if( !$lastCode){
        $number = 0;
      }else{
        $number = substr($lastCode->id, 3);
      }

      return strtoupper(str_random(3)) . sprintf('%04d', intval($number) + 1);
    }
  
    public function destroy($id)
    {
         Attendence::find($id)->delete($id);

        return back()->with('flash_message','Employee Attendance was deleted successfully');
    }
  

    public function signOut($id)
    {
            $signout = Attendence::find($id);
      
            $signout->status = 'Signed Out';

            $signout->save();


      return back()->with("flash_message", "You have successfully signed out.");
    }
  
}
