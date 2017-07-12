<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\leaveDetail;

use Session;

class LeaveDetailsController extends Controller
{
   public function index(Request $request){
     $leavedetails = leaveDetail::all();
      return view('leaveDetails.index', ['leavedeatails' => $leavedetails])->with('i', ($request->input('page', 1) - 1) * 5);
   }
  
   public function store(Request $request)
    {
          $this->validate($request, [
            'leave_count' => 'required|string'

        ]); 

        $leavedetails = new leaveDetail();
        $leavedetails->leave_count = $request->leave_count;
        
        $leavedetails->save();

        Session::flash('flash_message', 'Leave Details was successfully Submitted!');

        return back();
    }
}
