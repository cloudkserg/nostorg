@extends(AdminTemplate::getViewPath('_layout.inner'))

@section('content')
	<div class="wrapper">
		<header class="main-header">
			@include(AdminTemplate::getViewPath('_partials.header'))
		</header>

		<aside class="main-sidebar">
			@include(AdminTemplate::getViewPath('_partials.navigation'))
		</aside>

		<div class="content-wrapper">

			<div class="content-header">
				<h1>
					@yield('content-title')
				</h1>
			</div>

			<div class="content body">
				@yield('content.top')

				@yield('content-text')

				@yield('content.bottom')
			</div>
		</div>
	</div>
@stop