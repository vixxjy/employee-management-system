 @extends('layout.master')

  @section('title')
  HRM Leave Category
 @endsection

 @section('content')
    <div class="content">
      <div class="container-fluid">
	
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
									 @include('includes.error')
			              @include('includes.success')
                </div>
                  <div class="panel-body">
                     {!! Form::model($leaveCategory, ['method' => 'PATCH','route' => ['leaveCategory.update', $leaveCategory->id]]) !!}
									
                          <div class="form-group">
                            <label>Leave Category</label>
                            <input type="text" class="form-control" name="leave_category" placeholder="Leave Category" value="{{ $leaveCategory->leave_category}}">
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