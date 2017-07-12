 @extends('layout.master')

  @section('title')
  HRM Leave Approval
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
						</button></a>	  <a href="/leaveApproval">	<button class="btn btn-primary">
							Leave Approval
						</button></a>		
					</div>
				</div>
        <br>
    </div>
</div>

@endsection