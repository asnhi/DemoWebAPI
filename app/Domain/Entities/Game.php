<?php
declare(strict_types=1);
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'genre_id', 'name', 'description', 'price', 'image', 'publisher_id', 'like', 'status'
    ];
    protected $table = 'games';

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id'); // Thêm tham số 'genre_id' để chỉ định khóa ngoại
    }

    public function scopeByGenre(Builder $query, $genre)
    {
        return $query->where('genre_id', $genre);
    }

    public function scopePopular(Builder $query)
    {
        return $query->orderByDesc('like');
    }

    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }

}
