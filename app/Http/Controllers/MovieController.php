<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        // echo json_encode( $movies->toArray() );

        return view('movies',compact('movies')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // THIS IS POST, when you hit submit to create a new movie.

        $movie = new Movie();
        $movie->name = $request->name //input('name', 'untitled');
        $movie->description = $request->description //input('description','');
        $movie->save();

        return redirect()->route('movie_by_id', ['id' => $movie->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movie-read',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }


    /**
     * Display the specified resource using id.
     *
     * @param  $id The movie id
     * @return \App\Movie->show()
     */
    public function fetch_by_id(int $id)
    {
        $movie = \App\Movie::find($id);

        if ( ! $movie ) {
            return abort(404);
        }

        return $this->show( $movie );
    }


    // creating new movie by sending JSON request.

    // CSRF
    // Option 1. Disable CSRF for this laravel site.
    // Option 2. Register this route as "api" group.
    public function store_by_json_post( Request $request ) {

        // post request
        // $post['json'] = '{ "name": "Title", "description": "Description" }';
        // json_decode( $post['json']);

        $json_request = ''; // <~~ kunin mo yung JSON na sinend gamit yung POST

        // extract attributes.
        $name = $json_request->name;
        $description = $json_request->description;

        // save the new movie.
        $movie = new Movie();
        $movie->name = $name;
        $movie->description = $description;
        $movie->save();

        return $movie->toJson();
    }


}
