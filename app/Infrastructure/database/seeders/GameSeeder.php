<?php

namespace Database\Seeders;
use App\Models\Game;

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::factory()->count(5)->create();
    }
}