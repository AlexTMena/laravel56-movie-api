@extends('base')

@section('content')

<div class="container">
	

@foreach($movies as $movie)
	

	<div class="row">

		{{ $movie->name }}
		
		<a href="/movie/{{ $movie->id }}">View details</a>

	</div>

@endforeach

</div>

@endsection