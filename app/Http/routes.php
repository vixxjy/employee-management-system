<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//landing page for guest
Route::get('/', function () {
    return view('welcome');
});



Route::post('/login/user', ['uses' =>'LoginController@postLogin', 'as' => 'login.page']);




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

 


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //employee user page
    Route::get('/home', ['uses'=>'HomeController@index', 'as' => 'home']);
//     Route::post('/leave', ['uses' => 'HomeController@store','as' => 'leave.store']);
    
  
  //admin dasboard route
  Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
  
// department Routes  
  Route::get('/department', ['uses' => 'DepartmentController@index', 'as' => 'department']);
  Route::post('/department/Create', ['uses' => 'DepartmentController@store','as' => 'department.store']);
  Route::get('departments/{id}/edit',['as'=>'department.edit','uses'=>'DepartmentController@edit']);
  Route::patch('departments/{id}',['as'=>'department.update','uses'=>'DepartmentController@update']);
  Route::delete('departments/{id}',['as'=>'department.destroy','uses'=>'DepartmentController@destroy']);
  
  // designation Route
  Route::get('/designation', ['uses' => 'DesignationController@index','as' => 'designation']);
  Route::post('/designation/Create', ['uses' => 'DesignationController@store','as' => 'designation.store']);
  Route::get('designation/{id}/edit',['as'=>'designation.edit','uses'=>'DesignationController@edit']);
  Route::patch('designation/{id}',['as'=>'designation.update','uses'=>'DesignationController@update']);
  Route::delete('designation/{id}',['as'=>'designation.destroy','uses'=>'DesignationController@destroy']);
  
  // employee Route
  Route::get('/employee', ['uses' => 'EmployeeController@index', 'as' => 'employee']);
  Route::get('/employee/create', ['uses' => 'EmployeeController@create', 'as' => 'employee.create']);
  Route::post('/employee/create', ['uses' => 'EmployeeController@store','as' => 'employee.store']);
  Route::get('employee/{id}',['as'=>'employee.show','uses'=>'EmployeeController@show']);
//   Route::get('employee/{id}/edit',['as'=>'employee.edit','uses'=>'EmployeeController@edit']);
  Route::patch('employee/{id}',['as'=>'employee.update','uses'=>'EmployeeController@update']);
  Route::delete('employee/{id}',['as'=>'employee.destroy','uses'=>'EmployeeController@destroy']);
  
  
    // bankdetails Route
    Route::get('/bankdetail', ['uses' => 'BankDetailsController@index', 'as' => 'bankdetail']);
    Route::post('/bankdetail/create', ['uses' => 'BankDetailsController@store','as' => 'bankdetail.store']);
    Route::get('bankdetail/{id}/edit',['as'=>'bankdetail.edit','uses'=>'BankDetailsController@edit']);
    Route::patch('bankdetail/{id}',['as'=>'bankdetail.update','uses'=>'BankDetailsController@update']);
    Route::delete('bankdetail/{id}',['as'=>'bankdetail.destroy','uses'=>'BankDetailsController@destroy']);
  
  // leave category Route
    Route::get('/leave/category', ['uses' => 'LeaveCategoryController@index', 'as' => 'leaveCategory']);
    Route::post('/leave/category/create', ['uses' => 'LeaveCategoryController@store','as' => 'leaveCategory.store']);
    Route::get('/leave/category/{id}/edit',['as'=>'leaveCategory.edit','uses'=>'LeaveCategoryController@edit']);
    Route::patch('/leave/category/{id}',['as'=>'leaveCategory.update','uses'=>'LeaveCategoryController@update']);
    Route::delete('/leave/category/{id}',['as'=>'leaveCategory.destroy','uses'=>'LeaveCategoryController@destroy']);
   // leave details Route
   Route::get('/leaveDetails', ['uses' => 'LeaveDetailsController@index', 'as' => 'leaveDetail']);
   Route::post('/leaveDetails/create', ['uses' => 'LeaveDetailsController@store','as' => 'leaveDetail.store']);
   Route::get('/leave/Details/{id}/edit',['as'=>'leaveDetail.edit','uses'=>'LeaveDetailsController@edit']);
   Route::patch('/leave/Detail/{id}',['as'=>'leaveDetail.update','uses'=>'LeaveDetailsController@update']);
   Route::delete('/leave/Detail/{id}',['as'=>'leaveDetail.destroy','uses'=>'LeaveDetailsController@destroy']);
  
    // leave Application Route
    Route::get('/leave/application', ['uses' => 'LeaveApplicationController@index', 'as' => 'leaveApplication']);
    Route::get('/leave/application/create', ['uses' => 'LeaveApplicationController@create','as' => 'leave.create']);
    Route::post('/leave/application/post', ['uses' => 'LeaveApplicationController@store','as' => 'leave.store']);
    Route::delete('/leave/application/{id}',['as'=>'leaveApplication.destroy','uses'=>'LeaveApplicationController@destroy']);
    Route::post('approve_leave/{id}',[ 'uses'=> 'LeaveApplicationController@approval', 'as'=>'leave.approved']);
    Route::get('leave/application/{id}',['as'=>'leaveApplication.show','uses'=>'LeaveApplicationController@show']);
  
   // leave Approval Route
   Route::get('/leaveApproval', ['uses' => 'LeaveApprovalController@index', 'as' => 'leaveApproval']);
    
    //comment route
  Route::post('comment',['uses' => 'CommentsController@postComment', 'as' => 'comment.post']);
  //attendence route
   Route::get('/attendance',['uses' => 'AttendanceController@index', 'as' => 'attendance']);
   Route::get('/employee/attendance/create',['uses' => 'AttendanceController@create', 'as' => 'attendance.create']);
   Route::post('/employee/attendance/create',['uses' => 'AttendanceController@store', 'as' => 'attendance.store']);
   Route::delete('/employee/attendance/{id}',['as'=>'attendance.destroy','uses'=>'AttendanceController@destroy']);
   Route::post('attendance/signout/{id}',[ 'uses'=> 'AttendanceController@signOut', 'as'=>'attendance.signout']);
});
