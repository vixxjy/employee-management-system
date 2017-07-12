 @extends('layout.master')

  @section('title')
  HRM Department 
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
					<a href="/department">	<button class="btn btn-success">
							Department
						</button></a>	  <a href="/designation">	<button class="btn btn-primary">
							Designation
						</button></a>	  <a href="/employee">	<button class="btn btn-primary">
							Employee
						</button></a>	  <a href="/bankdetail">	<button class="btn btn-primary">
							Bank Details
						</button></a>		<a href="">	<button class="btn btn-primary">
							Withdrawal
						</button></a>
					</div>
				</div>
				<br>
          <div class="row">

              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    @include('includes.error')
			              @include('includes.success')
                   </div>
                  <div class="panel-body">
                    <form method="POST" action="{{ route('department.store') }}">
                        <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="dept_name" placeholder="Department" value="{{ old('dept_name') }}">
                        </div>
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                         <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                    </form>
                  </div>
                  </div>  
              </div>
              <div class="col-md-6">
                <div class="well">
                     <div class="content table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Department</th>
                                      <th>Code</th>
                                    </thead>
                                    <tbody>
                                      @foreach( $departments as $department)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
                                        	<td>{{ $department->dept_name}}</td>
                                          <td>{{ $department->dept_code}}</td>
																					<td><a href="{{ route('department.edit',$department->id) }}" class="btn btn-warning">Edit</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['department.destroy', $department->id]  ]) !!}
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
