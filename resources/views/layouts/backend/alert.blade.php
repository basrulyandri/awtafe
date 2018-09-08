
	
		@if(Session::has('alert-success'))
		<div class="alert alert-success">		 
		  <i class="icon fa fa-success"></i>{!!Session::get('alert-success')!!}
		</div>
		@endif

		@if(Session::has('alert-warning'))
		<div class="alert alert-warning">		  
		  <i class="icon fa fa-warning"></i>{!!Session::get('alert-warning')!!}
		</div>
		@endif

		@if(Session::has('alert-danger'))
		<div class="alert alert-danger">		  
		  <i class="icon fa fa-warning"></i>{!!Session::get('alert-danger')!!}
		</div>
		@endif

