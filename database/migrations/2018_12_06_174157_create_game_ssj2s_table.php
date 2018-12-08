<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamessj2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_ssj2s', function (Blueprint $table) {
            $table->increments('id');

            $table->string ('name');
            $table->text ('description');
            $table->string ('image');
            $table->string('platform');
            $table->date('date');
            $table->string('link');
            /*
            //Genre Relation
            $table->integer('genre_id')->unsigned();
            $table->foreign('id')->references('genre_id')->on('genre');

            //Studio Relation
            $table->integer('studio_id')->unsigned();
            $table->foreign('studio_id')->references('id')->on('studio');

            //Music Relation
            $table->integer('soundtrack_id')->unsigned();
            $table->foreign('soundtrack_id')->references('id')->on('soundtrack');
            */
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('games_ssj2s');
    }
}