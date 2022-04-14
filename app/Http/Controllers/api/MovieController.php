<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Movie;
use App\Http\Resources\Movie as MovieResources;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorna todos os filmes cadastrados
        $movies = Movie::all();
        return new MovieResources($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Faz o cadastro de um filme
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->duration = $request->input('duration');
        $movie->language = $request->input('language');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->Country = $request->input('country');
        $movie->Genre = $request->input('genre');
        $movie->save();

        return new MovieResources($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Exibe um unico registro de filme do banco
        $movie = Movie::findOrFail($id);
        return new MovieResources($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Atualiza um registro de um filme no banco
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->duration = $request->input('duration');
        $movie->language = $request->input('language');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->Country = $request->input('country');
        $movie->Genre = $request->input('genre');
        $movie->save();

        return new MovieResources($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deleta um registro de filme do banco
        $movie = Movie::findOrFail($id);
        if($movie->delete()){
           return new MovieResources($movie);
        }
    }
}
