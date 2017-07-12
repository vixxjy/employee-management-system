<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Department;
use App\Designation;

use Session;

class EmployeeController extends Controller
{
    public function index(Request $request){
      
      $employees = Employee::all();
      return view('employee.index', ['employees' => $employees])->with('i', ($request->input('page', 1) - 1) * 5);
    }
    protected $states = [
        "Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Abuja", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "kastina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"
    ];
    public function create()
    {
      $department = Department::all();
      $designation = Designation::all();
      $lgas = ['ph', 'fg', 'er'];
      return view('employee.create', ['departments' => $department, 'designations' => $designation, 'states' => $this->states, 'lgas' => $lgas]);
    }
    public function employee_code(){
        
      $lastUnique = Department::orderBy('id', 'desc')->pluck('id')->first();
      return $lastUnique + 101;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
//             'employee_code' => 'required',
          'joined_date' => 'required',
          'department' => 'required',
          'designation' => 'required',
          'experience' => 'required',
          'qualification' => 'required',
          'fname' => 'required',
          'lname' => 'required',
          'mdname' => 'required',
          'date_of_birth' => 'required',
          'gender' => 'required',
          'present_address' => 'required',
          'permanent_address' => 'required',
          'state' => 'required',
          'local_area' => 'required',
          'phone' => 'required',
          'email' => 'required',

        ]); 

        $employee = new Employee();
      
        $employee->employee_code = $this->employee_code();
        $employee->joined_date = $request->joined_date;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->experience = $request->experience;
        $employee->qualification = $request->qualification;
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->mdname = $request->mdname;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->gender = $request->gender;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->state = $request->state;
        $employee->local_area = $request->local_area;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        
        $employee->save();

        Session::flash('flash_message', 'Employee was successfully added!');

        return redirect()->route('employee');
    }
    
    public function show($id)
    {
       $employees =  Employee::find($id);
      return view('employee.show', ['employees' => $employees]);
    }

      public function update(Request $request, $id)
    {
//         $this->validate($request, [
//             'dept_name' => 'required',
//         ]);
        $employee = Employee::findOrFail($id);
      
        $employee->employee_code = $this->employee_code();
        $employee->joined_date = $request->joined_date;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->experience = $request->experience;
        $employee->qualification = $request->qualification;
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->mdname = $request->mdname;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->gender = $request->gender;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->state = $request->state;
        $employee->local_area = $request->local_area;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        
        $employee->save();
        
        Session::flash('flash_message', 'Employee was successfully Updated!');
        return redirect()->route('employee');
    }
  
     public function destroy($id)
    {
         Employee::find($id)->delete($id);

        return back()->with('flash_message','Employee was deleted successfully');
    }
}
