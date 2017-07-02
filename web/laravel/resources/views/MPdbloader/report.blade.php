@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>{{ $report }}<h1></div>
					<div class="panel-body">
						<a href="{{ route('MPdbloader::index') }}" title="Menu">Retour</a>
						<p>{{ $msg }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
