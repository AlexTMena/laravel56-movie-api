@extends('base')

@section('content')

<div class="container">
	

@foreach($movies as $movie)
	

	<div class="row">
		
		{{ $movie->name }}
		
	</div>

@endforeach

</div>

@endsection