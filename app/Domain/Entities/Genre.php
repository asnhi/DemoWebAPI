<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    protected $table = 'genres';
    public function games()
    {
        return $this->hasMany(Game::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($genre) {
            // Trước khi xóa thể loại, xóa tất cả các trò chơi liên quan
            $genre->games()->delete();
        });
    }
}
