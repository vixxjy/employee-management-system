 @extends('layout.master')

  @section('title')
  HRM Employee
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">

          <div class="row">
						<form method="POST" action="{{ route('employee.store')}}" enctype="multipart/form-data">
              <div class="col-md-12">
								    @include('includes.error')
			              @include('includes.success')
                <div class="panel panel-default">
                  <div class="panel-heading">
                  Employee Details
                   </div>
                  <div class="panel-body">
									
											 <div class="col-md-4">
														 <div class="form-group">
																<label for="">Joined Date</label>
																<input type="text" class="form-control" name="joined_date" id="joined_date" placeholder="Joined Date" value="{{ old('joined_date') }}">
															</div>
													 </div>

													 <div class="col-md-4">
														 <div class="form-group">
																<label>Department</label>
																		<select name="department" class="form-control">
																				<option value="">select department</option>
																				 @foreach( $departments as $key => $department)
																				<option value="{{ $department["id"] }}">{{ $department['dept_name'] }}</option>
																				@endforeach
																		</select>
														</div>
													</div>

													<div class="col-md-4">
														 <div class="form-group">
																<label>Designation</label>
																		<select name="designation" class="form-control">
																				<option value="">select designation</option>
																				 @foreach( $designations as $key => $designation)
																				<option value="{{ $designation["id"] }}">{{ $designation['designation'] }}</option>
																				@endforeach
																		</select>
														</div>
													</div>
											<div class="col-md-4">
														<div class="form-group">
																 <label>Qualification</label>
																	<select name="qualification" class="form-control">
																			<option value="">select Qualification</option>
																			<option value="b.tech">B.Tech</option>
																			<option value="b.eng">B.Eng</option>
																			<option value="bsc">BSC</option>
																			<option value="masters">Masters</option>
																	</select>
														</div>
													</div>
										
												<div class="col-md-4">
														<div class="form-group">
																 <label>Experience Level</label>
																	<select name="experience" class="form-control">
																			<option value="">select level</option>
																			<option value="professional">Professional</option>
																			<option value="high">High</option>
																			<option value="medium">Medium</option>
																			<option value="low">Low</option>
																	</select>
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
                  <div class="panel-heading">
                  	Personal Details
                   </div>
                  <div class="panel-body">
													<div class="col-md-4">
														 <div class="form-group">
																<label for="">first Name</label>
																<input type="text" class="form-control" name="fname" placeholder="First Name" value="{{ old('fname') }}">
															</div>
													 </div>

													 <div class="col-md-4">
														 <div class="form-group">
																<label for="">Last Name</label>
																<input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{ old('lname') }}">
															</div>
													 </div>

													<div class="col-md-4">
														 <div class="form-group">
																<label for="">Middle Name</label>
																<input type="text" class="form-control" name="mdname" placeholder="Middle Name" value="{{ old('mdname') }}">
															</div>
													 </div>
												</div>
										<div class="container">
													<div class="col-md-4">
														 <div class="form-group">
																<label for="">Date of Birth</label>
																<input type="text" class="form-control" name="date_of_birth" placeholder="Date of Birth" value="{{ old('date_of_birth') }}">
															</div>
													 </div>
													 <div class="col-md-4">
														<div class="form-group">
																 <label>Gender</label>
																	<select name="gender" id="gender_id" class="form-control">
																			<option value="">select Gender</option>
																			<option value="male">Male</option>
																			<option value="female">Female</option>
																	</select>
														</div>
													</div>
										</div>		
									</div>
			 
								</div>
						</div>
							
						<div class="col-md-12">
							
                <div class="panel panel-default">
                  <div class="panel-heading">
                  			Contact details
                   </div>
                  <div class="panel-body">
											<div class="col-md-4">
															<div class="form-group">
															<label for="">Present Address</label>
															<input type="text" class="form-control" name="present_address" placeholder="Present Address" value="{{ old('present_address') }}">
														</div>
													</div>

													 <div class="col-md-4">
															<div class="form-group">
															<label for="">Permanent Address</label>
															<input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address" value="{{ old('permanent_address') }}">
														</div>
													</div>

													 <div class="col-md-4">
														 <div class="form-group">
																<label>State</label>
																		<select name="state" class="form-control">
																				<option value="">select State</option>
 																		@foreach($states as $state)
																				<option value="{{ $state }}" @if (old('state') == $state) selected="selected" @endif>{{ $state }}</option>
																			@endforeach
																		</select>
														</div>
													</div>
										
													<div class="col-md-4">
														 <div class="form-group">
																<label>LGA</label>
																		<select name="local_area" class="form-control">
																				<option value="">select LGA</option>
																				@foreach($lgas as $lga)
																				<option value="{{ $lga }}">{{ $lga }}</option>
																				@endforeach
																		</select>
														</div>
													</div>

												<div class="col-md-4">
														<div class="form-group">
														<label for="phone">Phone</label>
														<input type="integer" class="form-control" name="phone" id="phone" placeholder="Employee Phone" value="{{ old('phone') }}">
													</div>
										</div>

													<div class="col-md-4">
														<div class="form-group">
															<label for="email">E-mail</label>
															<input type="text" class="form-control" name="email" id="email" placeholder="Student Email" value="{{ old('email') }}">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
																				<label>upload Photo</label>
																				<input type="file" name="image">
																		</div>
																</div>

														<div class="col-md-10">
														<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
														<button type="submit" class="btn btn-primary">Submit</button>
														</div>
										</div>
								</div>
							</form>
						</div>
				</div>
		</div>


 @endsection
