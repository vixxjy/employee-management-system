@extends('layout.master')

  @section('title')
  HRM Leave Application
 @endsection

 @section('content')
  <div class="content">
      <div class="container-fluid">
				<div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="well">
                 <div class="panel panel-default">
                  <div class="panel-heading">
										@include('includes.error')
			              @include('includes.success')
                    <h3 style="text-align: center">
                     <strong>Employee Leave Application</strong>
											<p><strong>APPLICATION ID : </strong><span class="label label-info">{{ $leaveShows->leave_id }}</span></p>
                    </h3> 
                   </div>
                  <div class="panel-body">
										<div class="row">
											  <p style="text-align: center"><strong><u>{{ $leaveShows->title }}</u></strong></p>
											<div class="col-md-8">
										    
                           <p>
                            <strong>Leave Category : </strong> {{ $category->leave_category }}
                           </p>
													    <p>
																<strong>Leave Status : </strong>
                            	@if ($leaveShows->status == 'Approved')
															<span class="label label-success">{{ $leaveShows->status}}</span>
																@else<span class="label label-danger">{{ $leaveShows->status }}</span>
															@endif
                          </p>
											</div>
											<div class="col-md-4">
												<p><strong>Date From : </strong>{{ $leaveShows->leave_from }}</p>
                      		
                          <p><strong>Date To : </strong>{{ $leaveShows->leave_to }}</p>
											</div>
										</div>
                      <p><strong>Created on:</strong> {{ $leaveShows->created_at->diffForHumans() }}</p> 
										<br>
                          <p><strong>Reasons For Leave Application: </strong> <br>{{ $leaveShows->reason }}</p>
                   <br>
                    <form class="" role="form" method="POST" action="{{ route('comment.post')}}">
                        {!! csrf_field() !!}
											<input type="hidden" name="leave_application_id" value="{{ $leaveShows->id }}">
                     <div class="form-group">
                       <textarea rows="5" id="comment" class="form-control" name="comment"></textarea>
                      </div>    

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> comment
                                </button>
                            </div>
                        </div>
                    </form>
									
										<div class="pull-right">
											<form action="{{ route('leave.approved', $leaveShows->id) }}" method="POST">
													{!! csrf_field() !!}
													<button type="submit" class="btn btn-success">Approve</button>
											</form>
										</div>
										<hr>
										<br>
										<br>
										<div class="row">
												@foreach ($comments as $comment)
														<div class="panel panel-@if($leaveShows->user->id == $comment->user_id) {{"default"}}@else{{"success"}}@endif">
															<div class="panel panel-body">
																		{{ $comment->comment }}     
																</div>	
															<div class="panel panel-heading">
																<p>
																	<strong>Supervisor: 	</strong> {{ ucfirst($comment->user->name) }} <span class="pull-right"><strong>Replied At: </strong> {{ $comment->created_at->format('Y-m-d') }}</span>
																</p>	
															</div>

															
														</div>
												@endforeach
										</div>
											<div class="col-md-2">
											<a href="{{ route('leaveApplication')}}"><button type="submit" class="btn btn-warning">Back</button></a>
										</div>
									 </div>
								</div>
          </div>
          </div>
       </div>
  </div>
</div>
@endsection