@extends('layouts.app')

@section('content')

<div class="container">
	<div class="jumbotron" style="background-color:#778899">
		<ol class="breadcrumb">
			<li><a href="#">Employee</a></li>
			<li><a href="#">Leave</a></li>
			<li class="active">Create</li>
      <li><a href="/home"><button class= "btn btn-primary">
        Back
        </button></a></li>
      	<li class="pull-right"> Employee Leave Application Form</li>
		</ol>

	
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel" style="background-color:#A9A9A9">
<!--                 <div class="panel-heading">Dashboard</div> -->

                <div class="panel-body">
                            <div class="col-md-10 col-md-offset-1">
              <div class="well">
                 <div class="panel panel-default">
                  <div class="panel-heading">
										@include('includes.error')
			              @include('includes.success')
                    <h3 style="text-align: center">
                    
                    </h3> 
                   </div>
                  <div class="panel-body">
                    <form class="" role="form" method="POST" action="{{ route('leave.store')}}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                          <label for="title" class="">Title</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                          <label for="category" class="">Category</label>
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                     <option value="{{ $category->id }}">{{ $category->leave_category }}</option>
                                    @endforeach
                                </select>
                        </div>

                            <div class="form-group">
                              <label  class="">From Date</label>
																<input type="text" name="leave_from" class="form-control" value="{{ old('leave_from') }}">
														</div>
             
                        
                            <div class="form-group">
                              <label  class="">To Date</label>
																<input type="text" name="leave_to" class="form-control" value="{{ old('leave_to') }}">
														</div>
                       
                      
                           <div class="form-group">
                              <label>Reason</label>
															<textarea type="textarea" class="form-control" name="reason" rows="7" value="{{ old('title') }}"></textarea>
														</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Send Application
                                </button>
                            </div>
                        </div>
                    </form>
									 </div>
								</div>
          </div>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
