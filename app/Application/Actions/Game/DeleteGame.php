<?php
declare(strict_types=1);

namespace App\Application\Actions\Game;
use App\Application\Builder\GameBuilder;

class DeleteGame
{
    public static function handle(GameBuilder $builder, int $id)
    {
        // Tìm game theo ID hoặc nếu không tìm thấy, sinh ra một ngoại lệ
        $game = $builder->findID($id);
        $game->delete();

        // Trả về true để chỉ ra rằng game đã được xóa thành công
        return 'Xóa thành công';
    }
}
