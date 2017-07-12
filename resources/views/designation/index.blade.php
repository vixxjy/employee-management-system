 @extends('layout.master')

  @section('title')
   HRM Designation
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
					<a href="/department">	<button class="btn btn-primary">
							Department
						</button></a>	  <a href="/designation">	<button class="btn btn-success">
							Designation
						</button></a>		<a href="/employee">	<button class="btn btn-primary">
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
                    <form method="POST" action="{{ route('designation.store') }}">
                        <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ old('designation') }}">
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
                                    	<th>Designation</th>
                                      <th>Code</th>
                                    </thead>
                                    <tbody>
                                      @foreach( $designations as $designation)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
                                        	<td>{{ $designation->designation}}</td>
                                          <td>{{ $designation->designation_code}}</td>
																					<td><a href="{{ route('designation.edit',$designation->id) }}" class="btn btn-warning">Edit</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['designation.destroy', $designation->id]  ]) !!}
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
