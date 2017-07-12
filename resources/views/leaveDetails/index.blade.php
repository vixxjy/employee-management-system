 @extends('layout.master')

  @section('title')
  HRM Leave Details
 @endsection

 @section('content')
    <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
					<a href="/leave/category">	<button class="btn btn-primary">
							Leave Category
						</button></a>	  <a href="/leaveDetails">	<button class="btn btn-success">
							Leave Details
						</button></a>	  <a href="/leaveApplication">	<button class="btn btn-primary">
							Leave Application
						</button></a>	  <a href="/leaveApproval">	<button class="btn btn-primary">
							Leave Approval
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
                      <form method="POST" action="{{ route('leaveDetail.store')}}">
                          <div class="form-group">
                            <label>Leave Category</label>
                                <select name="leave_category" class="form-control">
                                    <option value="">select Details</option>
                                </select>
														</div>
                            <div class="form-group">
																<label>Designation</label>
                                  <select name="designation" class="form-control">
																				<option value="">Select Designation</option>
                                  </select>
														</div>
                            <div class="form-group">
																<label>Leave Count</label>
																<input type="text" name="leave_count" class="form-control" value="">
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
                                    	<th>Category</th>
                                      <th>Designation</th>
																			<th>Leave Count</th>
                                    </thead>
                                    <tbody>
                                      @foreach( $leavedeatails as $leavedeatail)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
                                        	<td>{{ $leavedeatail->leave_category}}</td>
                                          <td>{{ $leavedeatail->designation}}</td>
																					<td>{{ $leavedeatail->leave_count}}</td>
																					<td><a href="{{ route('leaveDetail.edit',$leavedeatail->id) }}" class="btn btn-warning">Edit</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['leaveDetail.destroy', $leavedeatail->id]  ]) !!}
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



@endsection