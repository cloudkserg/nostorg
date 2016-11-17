<a href="{{ url(config('sleeping_owl.url_prefix')) }}" class="logo">
	<span class="logo-lg">{!! AdminTemplate::getLogo() !!}</span>
	<span class="logo-mini">{!! AdminTemplate::getLogoMini() !!}</span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			@yield('navbar')
		</ul>

		<ul class="nav navbar-nav navbar-right">
			@yield('navbar.right')
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user fa-fw"></i>
					{{ Auth::user()->name ?: 'admin' }}
				</a>
				<ul class="dropdown-menu">
					<li class="user-footer">
						<div class="pull-right">
							{{ Form::open(array('url' => '/logout')) }}
								<input type="submit" class="btn btn-default btn-flat" value="Выход"></input>
							{{ Form::close() }}
						</div>
					</li>
				</ul>
			</li>
		</ul>


	</div>
</nav>
