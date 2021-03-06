<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{route('page.home')}}"><img src="{!!url('assets-frontend')!!}/img/logo-binamadani.png" data-active-url="{!!url('assets-frontend')!!}/img/logo-binamadani.png" alt=""></a>
				<p class="site-name">STAI BINAMADANI</p>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">					
					<li><a href="#keunggulan">Keunggulan</a></li>
					@if(Auth::check())					
						@if(Auth::user()->canAccess('dashboard.index'))
						<li><a href="{{route('dashboard.index')}}" class="btn btn-blue">DASHBOARD</a></li>
						@endif
					@else
						<li><a href="{{route('auth.login')}}" class="btn btn-blue">LOGIN</a></li>
					@endif

					@if(Auth::check())
						<li><a href="{{route('auth.logout')}}" class="btn btn-red" title="Logout"><i class="icon fa fa-power-off"></i></a></li>
					@endif
					
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>