 @extends('layout.master')

  @section('title')
  HRM Employee
 @endsection

 @section('content')
 <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
					<a href="/department">	<button class="btn btn-primary">
							Department
						</button></a>	  <a href="/designation">	<button class="btn btn-primary">
							Designation
						</button></a>	  <a href="/employee">	<button class="btn btn-success">
							Employee
						</button></a>	  <a href="/bankdetail">	<button class="btn btn-primary">
							Bank Details
						</button></a>		<a href="">	<button class="btn btn-primary">
							Withdrawal
						</button></a>
						</div>
						<div class="col-md-2 col-md-offset-1">
						</button></a>		<a href="/employee/create">	<button class="btn btn-info">
						Add Employee
						</button></a>
						</div>
				</div>
				<br>
				<div class="row">
					 <div class="col-md-12">
                <div class="well">
										  @include('includes.error')
			              @include('includes.success')
                     <div class="content table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Employee Code</th>
                                      <th>Employee Name</th>
																			<th>Department</th>
                                      <th>Qualification</th>
																			<th>Designation</th>
                                      <th>Email</th>
                                    </thead>
                                    <tbody>
                  									@foreach( $employees as $employee)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
                                        	<td>{{ $employee->employee_code}}</td>
                                          <td>{{ $employee->lname }}</td>
																					<td>{{ $employee->department}}</td>
                                          <td>{{ $employee->qualification }}</td>
																					<td>{{ $employee->designation}}</td>
                                          <td>{{ $employee->email }}</td>
																					<td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-info">Show</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id]  ]) !!}
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
	 </div>
</div>
@endsection