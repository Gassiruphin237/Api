<?php

namespace App\Http\Controllers;

use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function getPokemon()
    {
        try {
            $pokemons = Pokemon::all();

            if ($pokemons->count() <= 0) {
                return response(([

                    "mesage" => "No registered pokemons"
                ]), 200);
            } else {
                return response(([

                    "Pokemons" => $pokemons
                ]), 200);
            }
        } catch (\Exception $e) {
            return response([
                "success" => "false",
                "message" => $e->getMessage()
            ], 201);
        }
    }
    public function addPokemon(Request $request)
    {
        try {
            // $image = Str::random(32).".".$request->image->getClientOriginalExtension();
            $validated = Validator::make($request->all(), [

                'name' => 'required|string|max:255',
                'weigth' => 'required|numeric|max:255',
                'image' => 'required|string|max:100 unique:pokemons',
                'description' => 'required|string|max:255',
            ]);

            if ($validated->fails()) {
                return response([
                    "error" => $validated->errors()
                ], 400);
            }

            $pokemon = Pokemon::create([

                'name' => $request->name,
                'weigth' => $request->weigth,
                'image' => $request->image,
                'description' => $request->description

            ]);

            // Storage::disk('public')->put($image, file_get_contents($request->image));

            return response([
                "message" => "Pokemon Created succefully !!!",
                "pokemon" => $pokemon
            ], 201);
        } catch (\Exception $e) {
            return response([
                "success" => "false",
                "message" => $e->getMessage()
            ], 201);
        }
    }
}
