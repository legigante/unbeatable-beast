@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>{{ $report }}<h1></div>
					<div class="panel-body">
						<a href="{{ route('MPdbloader::index') }}" title="Menu">Retour</a>
                        <a href="{{ route('MPdbloader::loadConfirm') }}" title="Confirmer">Click if you're sure you want to load these data to the database</a>
						
						<h1>Types</h1>
						@foreach ($data['types'] as $type)
							<li>{{ $type->tojson() }}</li>
						@endforeach
						
						<h1>Moves</h1>
						@foreach ($data['moves'] as $move)
							<li>{{ $move->tojson() }}</li>
						@endforeach
						
						<h1>Pokemons</h1>
						<ul>
						@foreach ($data['pokemons'] as $pokemon)
							<li>{{ $pokemon->tojson() }}</li>
						@endforeach
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
