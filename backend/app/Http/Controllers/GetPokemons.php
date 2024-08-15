<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetPokemonsRequest;
use App\Http\Resources\GetPokemon;
use App\Repository\PokemonRepository;

class GetPokemons extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetPokemonsRequest $request, PokemonRepository $repository)
    {
        $pokemons = $repository->getAll($request);

        return GetPokemon::collection($pokemons);
    }
}
