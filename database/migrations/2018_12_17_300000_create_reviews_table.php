<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text ('description');
            $table->string ('image')->default('');
            $table->text ('review');
            $table->foreign ('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            //$table->foreign ('genre_id')->references('id')->on('genre')->onDelete('cascade');
            // $table->integer ('genre_id')->unsigned()->index();
            $table->foreign ('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->integer ('game_id')->unsigned();

            /*

            //Studio Relation
            $table->integer('studio_id')->unsigned();
            $table->foreign('studio_id')->references('id')->on('studio');

            //Music Relation
            $table->integer('soundtrack_id')->unsigned();
            $table->foreign('soundtrack_id')->references('id')->on('soundtrack');
            */
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
        Schema::dropIfExists('reviews');
    }
}
