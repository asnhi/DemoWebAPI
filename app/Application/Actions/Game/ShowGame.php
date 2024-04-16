<?php

declare(strict_types=1);

namespace App\Application\Actions\Game;

use App\Application\Builder\GameBuilder;
use App\Domain\Entities\Game;

class ShowGame
{
    private $builder;

    public function __construct(GameBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function handle()
    {
        $games = Game::all();
    
        return response()->json($games);
    }
    

    public function showDetail(int $id)
    {
        $game = $this->builder->findID($id);

        return response()->json($game);
    }

    public function showFavorate()
    {

        // Lấy các trò chơi phổ biến (được sắp xếp theo số lượng like giảm dần)
        $favorateGames = $this->builder->popular();

        return response()->json($favorateGames);
    }

    public function showTopFavorate()
    {

        // Lấy các trò chơi phổ biến (được sắp xếp theo số lượng like giảm dần)
        $favorateGames = $this->builder->topPopular();

        return $favorateGames;
    }
}
