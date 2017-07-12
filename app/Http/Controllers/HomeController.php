<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

// use App\leaveApplication;

// use App\Mailers\AppMailer;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $leaveCategory = LeaveCategory::all();
        return view('home');
    }
  
 
}
