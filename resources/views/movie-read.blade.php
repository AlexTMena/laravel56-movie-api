// HTML to show the details of the movie, and update/delete it.

@extends('base')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col">
				
			<h1>{{ $movie->name }}</h1>
			<lead>{{ $movie->showingDate }}|{{ $movie->movieLength }}</lead>
			<p>{{ $movie->description }}</p>
			
			</div>
		</div>
	</div>






@endsection