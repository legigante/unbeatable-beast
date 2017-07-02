@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>MPdbloader<h1></div>
					<div class="panel-body">
						<ul>
							<li><a href="{{ route('MPdbloader::cerebiiImg') }}" title="Import Cerebii images">Import images</a></li>
                            <li><a href="{{ route('MPdbloader::cerebiiHtml') }}" title="Import Cerebii html files">Import html files</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
