@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>{{ $report }}<h1></div>
					<div class="panel-body">
                        @if ($report == 'Load data confirmation')
                            <a href="{{ route('MPdbloader::loadConfirm') }}" title="Confirmer">Click if you're sure you want to load these data to the database</a>
                        @endif
						<p>{{ $msg }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
