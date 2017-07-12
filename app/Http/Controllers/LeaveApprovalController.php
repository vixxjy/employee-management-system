<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LeaveApprovalController extends Controller
{
    public function index()
    {
      return view('leaveApproval.index');
    }
}
