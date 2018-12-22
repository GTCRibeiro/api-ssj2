<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_genre', function (Blueprint $table) {

            $table->integer('game_id')->unsigned()->nullable();
            $table->foreign('game_id')->references('id')
                ->on('games')->onDelete('cascade');

            $table->integer('genre_id')->unsigned()->nullable();
            $table->foreign('genre_id')->references('id')
                ->on('genres')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game__genres');
    }
}
