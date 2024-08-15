<?php

namespace App\Repository;

use App\Http\Requests\GetPokemonsRequest;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Collection;

class PokemonRepository
{
    public function getAll(GetPokemonsRequest $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Pokemon::paginate(
            perPage: $request->getLimit(),
            page: $request->getOffset()
        );
    }
}
