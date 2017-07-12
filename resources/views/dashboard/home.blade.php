
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Homepage</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
             
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                
                <li> 
                  <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                </li>
                   
              </ul>
            </div>
        </div>
    </nav>

        <div class="col-md-6">
              <div class="well">
                 <div class="panel panel-default">
                  <div class="panel-heading">
										
                    <h3 style="text-align: center">
                     Employee Leave Application Form
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
                            <label for="priority" class="">Priority</label>
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
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
															<textarea type="textarea" class="form-control" name="reason" rows="10" value="{{ old('title') }}"></textarea>
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


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
