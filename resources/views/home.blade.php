@extends('layouts.app')

@section('content')

<div class="container">
	<div class="jumbotron" style="background-color:#778899">
		<div class="page-header">
			<h2>Welcome To Smart HRM  <small>pls enjoy..</small></h2>
		</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Employee</a></li>
			<li class="active">Data</li>
		</ol>
		<div class = "row">
			<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-hourglass"></span>
							</a>
						</div>
					</div>
					<a href="{{ route('attendance.create')}}">
					<button class="btn btn-primary btn-lg" type="button">
						Attendance <span class="badge">1</span>
					</button>
					</a>
				</div>
			</div>
					<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-stats"></span>
							</a>
						</div>
					</div>
					<button class="btn btn-primary btn-lg" type="button">
						Employee Shift <span class="badge">2</span>
					</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-transfer"></span>
							</a>
						</div>
					</div>
					<a href="{{ route('leave.create')}}">
					<button class="btn btn-primary btn-lg" type="button">
						Employee Leave <span class="badge">3</span>
					</button>
					</a>
				</div>
			</div>
		</div>
		
				<div class = "row">
			<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-paperclip"></span>
							</a>
						</div>
					</div>
					<button class="btn btn-primary btn-lg" type="button">
						Employee Report <span class="badge">4</span>
					</button>
				</div>
			</div>
					<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-pushpin"></span>
							</a>
						</div>
					</div>
					<button class="btn btn-primary btn-lg" type="button">
						Suggestions <span class="badge">5</span>
					</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class = "well" style="background-color: #A9A9A9">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<span class="glyphicon glyphicon-usd"></span>
							</a>
						</div>
					</div>
					<button class="btn btn-primary btn-lg" type="button">
						Employee Payslip <span class="badge">6</span>
					</button>
				</div>
			</div>
		</div>
	

</div>
</div>
@endsection
