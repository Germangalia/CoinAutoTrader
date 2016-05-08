@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

<link rel=stylesheet href="{{asset('/css/app.css')}}" type="text/css">

@yield('scripts')

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						<h3>You are logged in CoinAutoTrader!</h3>

							<form id="main" v-cloak>

								<div class="bar">

									<!-- These two buttons switch the layout variable,
                                         which causes the correct UL to be shown. -->

									<a class="list-icon" v-bind:class="{ 'active': layout == 'list'}" v-on:click="layout = 'list'"></a>
									<a class="grid-icon" v-bind:class="{ 'active': layout == 'grid'}" v-on:click="layout = 'grid'"></a>
								</div>

								<!-- We have two layouts. We choose which one to show depending on the "layout" binding -->

								<ul v-if="layout == 'grid'" class="grid">
									<!-- A view with big photos and no text -->
									<li v-for="a in articles">
										<a v-bind:href="a.url" target="_blank"><img v-bind:src="a.image.large" /></a>
									</li>
								</ul>

								<ul v-if="layout == 'list'" class="list">
									<!-- A compact view smaller photos and titles -->
									<li v-for="a in articles">
										<a v-bind:href="a.url" target="_blank"><img v-bind:src="a.image.small" /></a>
										<h4>@{{a.title}}</h4>
									</li>
								</ul>

							</form>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
