 @extends('layout.master')

  @section('title')
  HRM Employee
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">
					<div class="row">
						 <div class="col-md-3">
						    <a href="#" class="thumbnail">
						      <img src="" alt="company logo">
						    </a>
						  </div>
						   <div class="col-md-6">
						    <a href="#" class="thumbnail" >
						      <div style="text-align: center;"><h2>COMPANY NAME</h2></div>
						      <div style="text-align: center;"><h5>COMPANY MOTTO</h4></div>
						      <div style="text-align: center;"><h3>COMPANY ADDRESS</h3></div>
						    </a>
						  </div>
						  <div class="col-md-3">
						    <a href="#" class="thumbnail">
						      <img src="" alt="employee image">
						    </a>
						  </div>
					</div>
          <div class="row">
            {!! Form::model($employees, ['method' => 'PATCH','route' => ['employee.update', $employees->id]]) !!}
<!-- 						<form method="POST" action="{{ route('employee.store')}}" enctype="multipart/form-data"> -->
              <div class="col-md-12">
								    @include('includes.error')
			              @include('includes.success')
                <div class="panel panel-default">
          
                  <div class="panel-body">
									
											 <div class="col-md-4">
														 <div class="form-group">
																<label for="">Joined Date</label>
																<input type="text" class="form-control" name="joined_date" id="joined_date" placeholder="Joined Date" value="{{ $employees->joined_date }}">
															</div>
													 </div>

													 <div class="col-md-4">
															<div class="form-group">
																<label for="">Department</label>
																<input type="text" class="form-control" name="department" id="" value="{{ $employees->department }}">
															</div>
													</div>

							            <div class="col-md-4">
															<div class="form-group">
																<label for="">Designation</label>
																<input type="text" class="form-control" name="designation" id="" value="{{ $employees->designation }}">
															</div>
													</div>
									       <div class="col-md-4">
															<div class="form-group">
																<label for="">Qualification</label>
																<input type="text" class="form-control" name="qualification" id="" value="{{ $employees->qualification }}">
															</div>
													</div>
										
									       <div class="col-md-4">
															<div class="form-group">
																<label for="">Experience</label>
																<input type="text" class="form-control" name="experience" id="" value="{{ $employees->experience }}">
															</div>
													</div>
<!-- 													<div class="col-md-4">
														 <div class="form-group">
																<label>User Type</label>
																		<select name="user" class="form-control">
																				<option value="">select user</option>

																				<option value=""></option>

																		</select>
														</div>
													</div> -->
									</div>
			 
								</div>
						</div>
							
						<div class="col-md-12">
	
                <div class="panel panel-default">
            
                  <div class="panel-body">
													<div class="col-md-4">
														 <div class="form-group">
																<label for="">first Name</label>
																<input type="text" class="form-control" name="fname" value="{{ $employees->fname }}">
															</div>
													 </div>

													 <div class="col-md-4">
														 <div class="form-group">
																<label for="">Last Name</label>
																<input type="text" class="form-control" name="lname" value="{{ $employees->lname }}">
															</div>
													 </div>

													<div class="col-md-4">
														 <div class="form-group">
																<label for="">Middle Name</label>
																<input type="text" class="form-control" name="mdname" value="{{ $employees->mdname }}">
															</div>
													 </div>
												</div>
										<div class="container">
													<div class="col-md-4">
														 <div class="form-group">
																<label for="">Date of Birth</label>
																<input type="text" class="form-control" name="date_of_birth" value="{{ $employees->date_of_birth }}">
															</div>
													 </div>
													  <div class="col-md-4">
															<div class="form-group">
																<label for="">Gender</label>
																<input type="text" class="form-control" name="gender" id="" value="{{ $employees->gender }}">
															</div>
													</div>
										</div>		
									</div>
			 
								</div>
						</div>
							
						<div class="col-md-12">
							
                <div class="panel panel-default">
 
                  <div class="panel-body">
											<div class="col-md-4">
															<div class="form-group">
															<label for="">Present Address</label>
															<input type="text" class="form-control" name="present_address" value="{{ $employees->present_address }}">
														</div>
													</div>

													 <div class="col-md-4">
															<div class="form-group">
															<label for="">Permanent Address</label>
															<input type="text" class="form-control" name="permanent_address" value="{{ $employees->permanent_address }}">
														</div>
													</div>

													<div class="col-md-4">
															<div class="form-group">
																<label for="">State</label>
																<input type="text" class="form-control" name="state" id="" value="{{ $employees->state }}">
															</div>
													</div>
										
													<div class="col-md-4">
															<div class="form-group">
																<label for="">LGA</label>
																<input type="text" class="form-control" name="local_area" id="" value="{{ $employees->local_area }}">
															</div>
													</div>

												<div class="col-md-4">
														<div class="form-group">
														<label for="phone">Phone</label>
														<input type="integer" class="form-control" name="phone" id="phone" value="{{ $employees->phone }}">
													</div>
										</div>

													<div class="col-md-4">
														<div class="form-group">
															<label for="email">E-mail</label>
															<input type="text" class="form-control" name="email" id="email" value="{{ $employees->email }}">
														</div>
													</div>

														<div class="col-md-10">
														<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
														<button type="submit" class="btn btn-primary">Submit</button>
														</div>
										</div>
								</div>
							{!! Form::close() !!}
						</div>
				</div>
		</div>


 @endsection
