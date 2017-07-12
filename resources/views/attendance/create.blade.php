@extends('layouts.app')

@section('content')

<div class="container">
	<div class="jumbotron" style="background-color:#778899">
		<ol class="breadcrumb">
			<li><a href="#">Employee</a></li>
			<li><a href="#">Attendance</a></li>
			<li class="active">Sheet</li>
      <li><a href="/home"><button class= "btn btn-primary">
        Back
        </button></a></li>
      	<li class="pull-right"> Employee Attendance Sheet</li>
		</ol>

	
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel" style="background-color:#B0C4DE">
<!--                 <div class="panel-heading">Dashboard</div> -->

                <div class="panel-body">
                            <div class="col-md-10 col-md-offset-1">
              <div class="well">
                 <div class="panel panel-default">
                  <div class="panel-heading">
										@include('includes.error')
			              @include('includes.success')
                    <h3 style="text-align: center">
                    
                    </h3> 
                   </div>
                  <div class="panel-body">
                    <form class="" role="form" method="POST" action="{{ route('attendance.store')}}">
                        {!! csrf_field() !!}

											 <p>

                       </p>
											
											 <p>

                       </p>
                        <div class="form-group">
                          <label for="category" class="">Department</label>
                                <select id="department" type="department" class="form-control" name="department">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                     <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                    @endforeach
                                </select>
                        </div>
											
											<div class="form-group">
                          <label for="category" class="">Designation</label>
                                <select id="designation" type="designation" class="form-control" name="designation">
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                     <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Sign in
                                </button>
                            </div>
                        </div>
                    </form>

											<form action="{{ route('attendance.signout', Auth::user()->id) }}" method="POST">
													{!! csrf_field() !!}
													<button type="submit" class="btn btn-danger">Sign Out</button>
											</form>
										
									 </div>
								</div>
          </div>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
