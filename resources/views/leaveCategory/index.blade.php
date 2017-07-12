 @extends('layout.master')

  @section('title')
  HRM Leave Category
 @endsection

 @section('content')
    <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
					<a href="/leave/category">	<button class="btn btn-success">
							Leave Category
						</button></a>	  <a href="/leaveDetails">	<button class="btn btn-primary">
							Leave Details
						</button></a>	  <a href="/leaveApplication">	<button class="btn btn-primary">
							Leave Application
						</button></a>	  <a href="/bankdetail">	<button class="btn btn-primary">
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
                      <form method="POST" action="{{ route('leaveCategory.store') }}">
									
                          <div class="form-group">
                            <label>Leave Category</label>
                            <input type="text" class="form-control" name="leave_category" placeholder="Leave Category" value="">
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
                                      <th>Leave Category</th>
                                    </thead>
                                    <tbody>
                        						    @foreach( $leaveCategory as $leaveCategory)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
                                        	<td>{{ $leaveCategory->leave_category}}</td>
																					<td><a href="{{ route('leaveCategory.edit',$leaveCategory->id) }}" class="btn btn-warning">Edit</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['leaveCategory.destroy', $leaveCategory->id]  ]) !!}
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