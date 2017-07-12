<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\leaveApplication;
use App\LeaveCategory;
use App\User;
use App\Mailers\AppMailer;
use Auth;
use Session;

class LeaveApplicationController extends Controller
{
    public function index(Request $request){
      $leaveApp = leaveApplication::all();
        $leaveCategory = LeaveCategory::all();
        $employee = User::all();
      return view('leaveApplication.index', ['categories' => $leaveCategory, 'leaveApps' => $leaveApp, 'employees' => $employee])->with('i', ($request->input('page', 1) - 1) * 5);
}
  
public function create()
{
  $leaveCategory = LeaveCategory::all();
   return view('leaveApplication.create', ['categories' => $leaveCategory]);
}
  
 public function store(Request $request, AppMailer $mailer)
    {
         $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
//            'priority' => 'required',
           'leave_from' => 'required',
           'leave_to' => 'required',
           'reason' => 'required'

        ]); 

        $LeaveApp = new LeaveApplication();
        
  
        $LeaveApp->user_id   = Auth::user()->id;
        $LeaveApp->leave_id = strtoupper(str_random(10));
        $LeaveApp->title = strtoupper($request->title);
        $LeaveApp->leave_category_id = $request->category;
//         $LeaveApp->priority = $request->priority;
        $LeaveApp->leave_from = $request->leave_from;
        $LeaveApp->leave_to = $request->leave_to;
        $LeaveApp->reason = $request->reason;
        $LeaveApp->status = "Unapproved";
        
        $LeaveApp->save();
        
        $mailer->sendLeaveInfo(Auth::user(), $LeaveApp);
        Session::flash('flash_message', 'Application was successfully Sent!');

        return back();
    }
  
public function approval($id, AppMailer $mailer)
{
    $leaveApplication = leaveApplication::find($id);

    $leaveApplication->status = 'Approved';

    $leaveApplication->save();

    $applicant = $leaveApplication->user;

    $mailer->sendStatusNotification($applicant, $leaveApplication);

    return back()->with("flash_message", "Employee Leave has been Approved.");
}
  
    public function show($id)
    {
       $leaveShow =  leaveApplication::find($id);
       $category = $leaveShow->leaveCategory;
       $comments = $leaveShow->comments;
      return view('leaveApplication.show', ['leaveShows' => $leaveShow, 'category' => $category, 'comments' => $comments]);
    }
  
    public function destroy($id)
    {
        leaveApplication::find($id)->delete($id);

        return back()->with('flash_message','Employee Leave Application was deleted successfully');
    }
}
