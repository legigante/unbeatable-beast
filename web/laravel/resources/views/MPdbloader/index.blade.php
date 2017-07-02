@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>MPdbloader<h1></div>
					<div class="panel-body">
						<ul>
							<li><a href="{{ route('MPdbloader::cerebii') }}" title="Cerebii crawler menu">Cerebii crawler</a></li>
                            <li><a href="{{ route('MPdbloader::load') }}" title="Data loader menu">Data loader</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
