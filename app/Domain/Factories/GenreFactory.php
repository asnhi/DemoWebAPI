<?php
declare(strict_types=1);


namespace App\Domain\Factories;

use App\Domain\Entities\Genre;

class GenreFactory {
    public static function create(array $attributes): Genre{
        return new Genre([
            'name' => $attributes['name'],
        ]);
    }
}


