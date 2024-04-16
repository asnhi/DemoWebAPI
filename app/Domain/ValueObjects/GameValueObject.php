<?php
declare(strict_types=1);

namespace App\Domain\ValueObjects;


class GameValueObject {
    public $genre_id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $publisher_id;
    public $like;
    public $status;

    public function __construct(array $data)
    {

        // Gán các giá trị từ dữ liệu vào các thuộc tính
        $this->genre_id = $data['genre_id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->image = $data['image'];
        $this->publisher_id = $data['publisher_id'];
        $this->like = $data['like'];
        $this->status = $data['status'];
    }

    public function toArray(): array
    {
        return [
            'genre_id' => $this->genre_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'publisher_id' => $this->publisher_id,
            'like' => $this->like,
            'status' => $this->status,
        ];
    }
}
