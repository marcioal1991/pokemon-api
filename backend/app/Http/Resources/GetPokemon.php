<?php

namespace App\Http\Resources;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPokemon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Pokemon $pokemon */
        $pokemon = $this->resource;
        return [
            'id' => $pokemon->getKey(),
            'name' => $pokemon->name,
            'type' => $pokemon->type,
            'weight' => $pokemon->weight * 100,
            'height' => $pokemon->height / 100,
        ];
    }
}
