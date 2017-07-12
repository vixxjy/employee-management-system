 @extends('layout.master')

  @section('title')
  HRM BankDetail
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
						</button></a>	  <a href="/employee">	<button class="btn btn-primary">
							Employee
						</button></a>	  <a href="/bankdetail">	<button class="btn btn-success">
							Bank Details
						</button></a>		<a href="">	<button class="btn btn-primary">
							Withdrawal
						</button></a>
					</div>
				</div>
        <br>
          <div class="row">
            <div class="col-md-5">
              <div class="panel panel-default">
                <div class="panel-heading">
									 @include('includes.error')
			              @include('includes.success')
                </div>
                  <div class="panel-body">
                      <form method="POST" action="{{ route('bankdetail.store') }}">
												<div class="form-group">
																<label>Employee Name</label>
																		<select name="fname" class="form-control">
																				<option value="">select Employee</option>
																				 @foreach( $employees as $key => $employee)
																				<option value="{{ $employee["id"] }}">{{ $employee['lname'] }}</option>
																				@endforeach
																		</select>
														</div>
												
													<div class="form-group">
																<label>Designation</label>
																		<select name="designation" class="form-control">
																				<option value="">select designation</option>
																				 @foreach( $designations as $key => $designation)
																				<option value="{{ $designation["id"] }}">{{ $designation['designation'] }}</option>
																				@endforeach
																		</select>
														</div>
												
													<div class="form-group">
															 <label>Bank Name</label>
																<select name="bank_name" id="bank_name" class="form-control">
																		<option value="">select Bank</option>
																		<option value="GTB bank">GTB BANK</option>
																		<option value="diamond bank">DIAMOND BANK</option>
																		<option value="first bank">FIRST BANK</option>
																		<option value="union bank">UNION BANK</option>
																</select>
													</div>
												
                          <div class="form-group">
                            <label>Bank address</label>
                            <input type="text" class="form-control" name="bank_address" placeholder="Bank address" value="">
                          </div>
                          <div class="form-group">
                           <label>Phone</label>
                           <input type="text" class="form-control" name="phone" placeholder="phone number" value="">
                          </div>
                          <div class="form-group">
                            <label>IFSC Code</label>
                            <input type="text" class="form-control" name="bank_code" placeholder="Code" value="">
                          </div>
                          <div class="form-group">
                            <label>Account No</label>
                            <input type="text" class="form-control" name="account_no" placeholder="*******0022" value="">
                          </div>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                           <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                      </form>
                 </div>
              </div>
          </div>
						<div class="col-md-7">
                <div class="well">
                     <div class="content table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                      <th>ID</th>
                                    	<th>Bank</th>
                                      <th>Account No</th>
																			<th>Phone</th>
																			 <th>Bank Code</th>
                                    </thead>
                                    <tbody>
                                      @foreach( $bankdetails as $bankdetail)
                                        <tr>
                                        	<td>{{ ++$i }}</td>
																					<td>{{ $bankdetail->bank_name}}</td>
                                        	<td>{{ $bankdetail->account_no}}</td>
                                          <td>{{ $bankdetail->phone}}</td>
																					<td>{{ $bankdetail->bank_code}}</td>
																					<td><a href="{{ route('bankdetail.edit',$bankdetail->id) }}" class="btn btn-warning">Edit</a></td>
																					<td>
																					{!! Form::open(['method' => 'DELETE','route' => ['bankdetail.destroy', $bankdetail->id]  ]) !!}
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