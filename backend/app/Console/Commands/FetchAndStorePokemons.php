<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Console\Command;

class FetchAndStorePokemons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-and-store-pokemons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $pokemons = \Http::get('https://pokeapi.co/api/v2/pokemon/?limit=1500')->json();

        $this->output->progressStart($pokemons['count']);

        \DB::transaction(function () use ($pokemons) {

            foreach ($pokemons['results'] as $pokemon) {
                $this->output->progressAdvance();
                $details = \Http::get($pokemon['url'])->json();

                $type = \Arr::first($details['types']) ?? null;
                $newPoke = new Pokemon();
                $newPoke->name = $pokemon['name'];
                $newPoke->type = $type['type']['name'] ?? 'Não possui';
                $newPoke->weight = $details['weight'];
                $newPoke->height = $details['height'];
                $newPoke->save();
            }
        });
        $this->output->progressFinish();

        $this->info(sprintf('Foram salvos %d pokemons', Pokemon::query()->count()));
    }
}
