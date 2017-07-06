@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
					<h2>Le menu dégueulasse</h2>
					<ul>
						<li><a href="/pokemon">Pokemons</a></li>
						<li><a href="/move">Moves</a></li>
						<li><a href="/type">Types</a></li>
						<li><a href="/users">Users</a></li>
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
