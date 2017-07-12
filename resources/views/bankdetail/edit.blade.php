 @extends('layout.master')

  @section('title')
  HRM Designation Edit 
 @endsection

 @section('content')
     <div class="content">
      <div class="container-fluid">
        		<div class="row">
								<div class ="col-md-12">
									<div class="panel panel-default">
                    <div class="panel-heading">
                    @include('includes.error')
			              @include('includes.success')
                   </div>
                     <div class="panel-body">
                     	{!! Form::model($bankdetails, ['method' => 'PATCH','route' => ['bankdetail.update', $bankdetails->id]]) !!}
										<div class="col-md-4">
											 <div class="form-group"> 
											 <label for="">Bank Name</label>
                        <input type="text" class="form-control" name="bank_name" id="" placeholder="Bank name" value="{{ $bankdetails->bank_name}}">
                        </div>
											 </div> 
											 	<div class="col-md-4">
													<div class="form-group">
                         <label for="">Designation</label>
                        <input type="text" class="form-control" name="designation" id="" placeholder="Bank name" value="{{ $bankdetails->bankdetail }}">
                        </div>
											 </div>
											 	<div class="col-md-4">
											<div class="form-group">
                         <label for="">Employee Name</label>
                        <input type="text" class="form-control" name="employee_name" id="" placeholder="Bank name" value="{{ $bankdetails->bankdetail }}">
                        </div>
											 </div>
											 	<div class="col-md-4">
												<div class="form-group">
                        <label for="">Bank address</label>
                        <input type="text" class="form-control" name="bank_address" id="" placeholder="Bank address" value="{{ $bankdetails->bank_address }}">
                        </div>
											 </div>
											 	<div class="col-md-4">
												 <div class="form-group">
                           <label for="">Phone</label>
                           <input type="text" class="form-control" name="phone"  id="phone" placeholder="phone number" value="{{ $bankdetails->phone }}">
                          </div>
											 </div>
											<div class="col-md-4">
											    <div class="form-group">
                            <label for="">IFSC Code</label>
                            <input type="text" class="form-control" name="bank_code"  id="bank_code" placeholder="Code" value="{{ $bankdetails->bank_code }}">
                          </div>
											 </div>
											<div class="col-md-4">
											<div class="form-group">
                            <label for="">Account No</label>
                            <input type="text" class="form-control" name="account_no" id="" placeholder="*******0022"  value="{{ $bankdetails->account_no }}">
                          </div>
											 </div>
											      
                     	<div class="col-md-10">
														<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
														<button type="submit" class="btn btn-primary">Submit</button>
														</div>
                     {!! Form::close() !!}
                    </div>
                     </div>
								</div>
						</div>
      </div>
</div>

 @endsection