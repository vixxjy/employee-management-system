<div class="row">
    <div class="col-md-8 col-md-offset-2">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    </div>
  </div>