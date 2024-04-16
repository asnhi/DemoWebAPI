<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->Integer('genre_id')->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->default(1);
            $table->string('name');
            $table->longText('description')->nullable(false);
            $table->double('price')->nullable(false)->default(0);
            $table->string('image')->nullable()->default('default.webp');
            $table->unsignedInteger('publisher_id')->nullable(false);
            $table->integer('like')->default(0);
            $table->string('status');
            $table->unique('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
