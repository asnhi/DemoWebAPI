<?php

declare(strict_types=1);

namespace App\Application\Actions\Genre;

use App\Application\Builder\GenreBuilder;
use App\Domain\Entities\Genre;

class ShowGenre
{
    private $builder;

    public function __construct(GenreBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function handle()
    {
        $games = Genre::all();
    
        return response()->json($games);
    }
    

    public function showgameOfGenre(int $id)
    {
        $game = $this->builder->findGameofGenre($id);

        return response()->json($game);
    }


}
