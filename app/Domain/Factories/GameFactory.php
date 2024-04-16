<?php
declare(strict_types=1);


namespace App\Domain\Factories;

use App\Domain\Entities\Game;

class GameFactory {
    public static function create(array $attributes): Game {
        return new Game([
            'genre_id' => $attributes['genre_id'],
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'price' => $attributes['price'],
            'image' => $attributes['image'],
            'publisher_id' => $attributes['publisher_id'],
            'like' => $attributes['like'],
            'status' => $attributes['status']
        ]);
    }
}


