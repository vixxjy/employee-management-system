<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Designation;
use App\BankDetail;

use Session;

class BankDetailsController extends Controller
{
    public function index(Request $request){
      $designation = Designation::all();
      $employee = Employee::all();
      $bankDetails = BankDetail::all();
      return view('bankdetail.index', ['designations' => $designation, 'employees' => $employee, 'bankdetails' => $bankDetails])->with('i', ($request->input('page', 1) - 1) * 5);
    }
  
    public function store(Request $request)
    {
          $this->validate($request, [
            'bank_name' => 'required',
            'bank_address' => 'required',
            'phone' => 'required',
            'bank_code' => 'required',
            'account_no' => 'required',
            

        ]); 

        $bankDetails = new BankDetail();
        $bankDetails->bank_name = $request->bank_name;
        $bankDetails->bank_address = $request->bank_address;
        $bankDetails->phone = $request->phone;
        $bankDetails->bank_code = $request->bank_code;
        $bankDetails->account_no = $request->account_no;
//         $bankDetails->bank_name = $request->bank_name;
        
       $bankDetails->save();

        Session::flash('flash_message', 'Bank Details was successfully Submitted!');

        return back();
    }
  
    public function edit($id)
    {
        $bankDetails = BankDetail::find($id);
        return view('bankdetail.edit', ['bankdetails' => $bankDetails]);
    }
  
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'bank_name' => 'required',
            'bank_address' => 'required',
            'phone' => 'required',
            'bank_code' => 'required',
            'account_no' => 'required',
            

        ]); 
      
        $bankDetails = BankDetail::findOrFail($id);
        
        $bankDetails->bank_name = $request->bank_name;
        $bankDetails->bank_address = $request->bank_address;
        $bankDetails->phone = $request->phone;
        $bankDetails->bank_code = $request->bank_code;
        $bankDetails->account_no = $request->account_no;
        
         $bankDetails->save();
        Session::flash('flash_message', 'Bank Details was successfully Updated!');
        return redirect()->route('bankdetail');
    }
  
    public function destroy($id)
    {
         BankDetail::find($id)->delete($id);

        return back()->with('flash_message','Bank Details was deleted successfully');
    }
}

