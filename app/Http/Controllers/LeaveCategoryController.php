<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LeaveCategory;
use Session;

class LeaveCategoryController extends Controller
{
   public function index(Request $request){
     $leaveCategory = LeaveCategory::all();
      return view('leaveCategory.index', ['leaveCategory' => $leaveCategory])->with('i', ($request->input('page', 1) - 1) * 5);
   }
  
  public function store(Request $request)
    {
         $this->validate($request, [
            'leave_category' => 'required'

        ]); 

        $LeaveCategory = new LeaveCategory();
        $LeaveCategory->leave_category = $request->leave_category;
        
       $LeaveCategory->save();

        Session::flash('flash_message', 'Leave Category was successfully added!');

        return back();
    }
 
    public function edit($id)
    {
         $leaveCategory = LeaveCategory::find($id);
        return view('leaveCategory.edit', ['leaveCategory' =>  $leaveCategory]);
    }
  
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'leave_category' => 'required'

        ]);
      
       $LeaveCategory = LeaveCategory::findOrFail($id);
        
       $LeaveCategory->leave_category = $request->leave_category;
        
       $LeaveCategory->save();
      
        Session::flash('flash_message', 'Leave Category was successfully Updated!');
        return redirect()->route('leaveCategory');
    }
  
    public function destroy($id)
    {
         LeaveCategory::findOrFail($id)->delete($id);

        return back()->with('flash_message','Leave Category was deleted successfully');
    }
}
