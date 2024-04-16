<?php

declare(strict_types=1);
//builder là service,
namespace App\Application\Builder;

use Illuminate\Database\Eloquent\Builder;
use App\Domain\Entities\Game;
use App\Domain\Factories\GameFactory;
use App\Domain\ValueObjects\GameValueObject;

class GameBuilder extends Builder
{
    // Phương thức tùy chỉnh để lọc các trò chơi theo thể loại
    
    public function newGame(GameValueObject $data)
    {
        // Sử dụng factory để tạo ra đối tượng Game từ dữ liệu đầu vào
        $game = GameFactory::create($data->toArray());

        // Lưu game vào cơ sở dữ liệu
        $game->save();

        return $game;
    }
    
    public function findID($id)
    {
        $game = Game::findOrFail($id);
        return $game;
    }
    public function byGenre($genre)
    {
        return $this->where('genre_id', $genre);
    }

    // Phương thức tùy chỉnh để lấy các trò chơi phổ biến
    public function popular()
    {
        // Tạo một truy vấn sử dụng model Game
        $query = Game::query();
    
        // Lấy các bản ghi có trường 'like' lớn hơn 300 và sắp xếp theo số lượng like giảm dần
        $popularGames = $query->where('like', '>', 300)->orderByDesc('like')->get();
    
        return $popularGames;
    }
    
    
    public function topPopular()
    {
        // Tạo một truy vấn sử dụng model Game
        $query = Game::query();
    
        // Sắp xếp các kết quả theo số lượng like giảm dần
        $popularGame = $query->orderByDesc('like')->first();
    
        return $popularGame;
    }

}
