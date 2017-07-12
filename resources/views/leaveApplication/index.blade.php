 @extends('layout.master')

  @section('title')
  HRM Leave Application
 @endsection

 @section('content')
    <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<a href="/leaveApplication">	<button class="btn btn-success">
							Leave Application
						</button></a>
						<a href="/leave/category">	<button class="btn btn-primary">
							Leave Category
						</button></a>	  <a href="/leaveDetails">	<button class="btn btn-primary">
							Leave Details
						</button></a>	  <a href="/leaveApproval">	<button class="btn btn-primary">
							Leave Approval
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
													<th>Employer NAME</th>
													<th>Leave ID</th>
													<th>Leave Category</th>
													<th>Title</th>
<!-- 													<th>Priority</th> -->
													<th>Date From</th>
													<th>Date To</th>
													<th>Reason</th>
													<th>Status</th>
												</thead>
												<tbody>
													@foreach( $leaveApps as $leaveApp)
														<tr>
															<td>{{ ++$i }}</td>
															@foreach ($employees as $employee)
																@if ($employee->id == $leaveApp->user_id)
															<td>{{ $employee->name}}</td>
															@endif
															@endforeach
															<td>{{ $leaveApp->leave_id}}</td>
															@foreach ($categories as $category)
																@if ($category->id == $leaveApp->leave_category_id)
															<td>{{ $category->leave_category}}</td>
																@endif
															@endforeach
															<td>{{ $leaveApp->title}}</td>
<!-- 															<td>{{ $leaveApp->priority}}</td> -->
															<td>{{ $leaveApp->leave_from}}</td>
															<td>{{ $leaveApp->leave_to}}</td>
															<td>{{ str_limit($leaveApp->reason, 30) }}</td>
															<td>
															@if ($leaveApp->status == 'Approved')
															<span class="label label-success">{{ $leaveApp->status}}</span>
																@else<span class="label label-danger">{{ $leaveApp->status }}</span>
															@endif
															</td>
															<td><a href="{{ route('leaveApplication.show',$leaveApp->id) }}" class="btn btn-info">S</a></td>
															<td>
															{!! Form::open(['method' => 'DELETE','route' => ['leaveApplication.destroy', $leaveApp->id]  ]) !!}
															{!! Form::submit('X', ['class' => 'btn btn-danger']) !!}
															{!! Form::close() !!}
															</td>
<!-- 															  <td>
																		<form action="{{ route('leave.approved', $leaveApp->id) }}" method="POST">
																				{!! csrf_field() !!}
																				<button type="submit" class="btn btn-success">A</button>
																		</form>
																</td> -->
														</tr>
													@endforeach
												</tbody>
										</table>
								</div>
					</div>
		</div>
</div>



@endsection