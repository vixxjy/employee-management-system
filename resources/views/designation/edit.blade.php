 @extends('layout.master')

  @section('title')
  HRM Designation Edit 
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">
        		<div class="row">
								<div class ="col-md-6">
									<div class="panel panel-default">
                  <div class="panel-heading">
                    @include('includes.error')
			              @include('includes.success')
                   </div>
                  <div class="panel-body">
                    	{!! Form::model($designations, ['method' => 'PATCH','route' => ['designation.update', $designations->id]]) !!}
                        <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ $designations->designation }}">
                        </div>
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                         <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                     {!! Form::close() !!}
                  </div>
                  </div>
								</div>
						</div>
      </div>
</div>


 @endsection
