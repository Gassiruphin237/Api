<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function getPokemon()
    {
        $pokemons = Pokemon::all();
        return array(([

            "mesage" => $pokemons
        ]),200);
    }
}
