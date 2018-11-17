// FORM to create a new movie

@extends('base')


@section('content')


<div class="container">
	
	<div class="row">
		
		<form action="movie-create" method="POST">
			@csrf
		  <div class="form-group">
		    <label for="name">Movie Name</label>
		    <input type="text" class="form-control" id="name" placeholder="" name="name">
		  </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>
</div>



@endsection