			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					@if($errors->any())
				    <div class="alert alert-danger">
				        @foreach($errors->all() as $error)
				            <p>{{ $error }}</p>
				        @endforeach
				    </div>
					@endif
				</div>
			</div>