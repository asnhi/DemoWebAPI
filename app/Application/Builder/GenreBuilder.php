<?php

declare(strict_types=1);

namespace App\Application\Builder;

use Illuminate\Database\Eloquent\Builder;
use App\Domain\Entities\Game;
use App\Domain\Entities\Genre;
use App\Domain\Factories\GenreFactory;
use App\Domain\ValueObjects\GenreValueObject;


class GenreBuilder extends Builder {
    public function newGenre(GenreValueObject $data)
    {
        // Sử dụng factory để tạo ra đối tượng Game từ dữ liệu đầu vào
        $genre = GenreFactory::create($data->toArray());

        // Lưu game vào cơ sở dữ liệu
        $genre->save();

        return $genre;
    }

        public function findGameofGenre($id)
        {
                return Game::where('genre_id', $id)->get();
        }

        public function findID($id)
        {
            $genre = Genre::findOrFail($id);
            return $genre;
        }

}
