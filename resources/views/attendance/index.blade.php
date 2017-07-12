 @extends('layout.master')

  @section('title')
  HRM Employee Attendance Sheet
 @endsection

 @section('content')
    <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<a href="/attendance">	<button class="btn btn-success">
							Attendance
						</button></a>
						<a href="">	<button class="btn btn-primary">
							Supervisors note
						</button></a>	  	
					</div>
				</div>
<br>
<div class="row">
  <div class="col-md-12">
		<div class="well">
			 @include('includes.success')
				 <div class="content table-responsive">
										<table class="table table-hover table-striped">
												<thead>
													<th>S/N</th>
													<th>Employer Name</th>
<!-- 													<th>Employer Code</th> -->
													<th>Attendance Code</th>
													<th>Department</th>
													<th>Designation</th>
													<th>Time in</th>
													<th>Time out</th>
													<th>Status</th>
												</thead>
												<tbody>
													@foreach( $attendances as $attendance)
														<tr>
															<td>{{ ++$i }}</td>
															@foreach ($employees as $employee)
																@if ($employee->id == $attendance->user_id)
															<td>{{ ucfirst($employee->name)}}</td>
															@endif
															@endforeach
                              
															<td>{{ $attendance->attendance_id}}</td>
															@foreach ($departments as $department)
																@if ($department->id == $attendance->department_id)
															<td>{{ $department->dept_name}}</td>
																@endif
															@endforeach
                              
                              @foreach ($designations as $designation)
																@if ($designation->id == $attendance->designation_id)
															<td>{{ $designation->designation}}</td>
																@endif
															@endforeach
															<td>{{ $attendance->created_at}}</td>
															<td>{{ $attendance->updated_at}}</td>
															<td>
															@if ($attendance->status == 'Signed Out')
															<span class="label label-danger">{{ $attendance->status}}</span>
																@else<span class="label label-success">{{ $attendance->status }}</span>
															@endif
															</td>
															<td>
															<form action="{{ route('attendance.signout', $attendance->id) }}" method="POST">
																		{!! csrf_field() !!}
																		<button type="submit" class="btn btn-danger">Out</button>
																</form>
															</td>
															<td>
															{!! Form::open(['method' => 'DELETE','route' => ['attendance.destroy', $attendance->id]  ]) !!}
															{!! Form::submit('X', ['class' => 'btn btn-danger']) !!}
															{!! Form::close() !!}
															</td>

														</tr>
													@endforeach
												</tbody>
										</table>
								</div>
					</div>
		</div>
</div>



@endsection