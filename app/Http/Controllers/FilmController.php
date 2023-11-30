<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;

class FilmController extends Controller
{
    public function index($genre = null, $film = null){

        $query = request()->query();

        $films = Film::with('director','actors','genre')
        ->when(array_key_exists('director', $query), function($q) use ($query){
            $q->where('director_id', $query['director']);
        })
        ->when(array_key_exists('genre', $query), function($q) use ($query){
            $q->wherein('genre_id', $query['genre']);
        })
        ->paginate(25);

        $actors = Actor::get();

        $directors = Director::get();

        $genries = Genre::get();

        return view('films.index', [
            'films' => $films, 
            'actors' => $actors, 
            'genries' => $genries, 
            'directors' => $directors
        ]);
    }
}
