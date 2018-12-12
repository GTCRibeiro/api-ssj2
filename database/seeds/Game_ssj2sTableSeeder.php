<?php

use Illuminate\Database\Seeder;

class Game_ssj2sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Game_ssj2s::create(
            [
                'title' => 'O melhor titulo de sempre',
                'description' => 'O melhor jogo de sempre',
                'name' => 'Dark Souls',
                'review' => 'que ganda jogo1 oh maninho',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/gRK7B2Z.png',
                'genre_id' => '1'

            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O segundo melhor titulo de sempre',
                'description' => 'O segundo melhor jogode sempre',
                'name' => 'Ultimate Smesh',
                'review' => 'que ganda jogo2 oh maninho',
                'user_id' => '2',
                'image' => 'https://i.imgur.com/hrMu1bL.jpg',
                'genre_id' => '2'
            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O terceiro melhor titulo de sempre',
                'description' => 'O terceiro melhor jogo de sempre',
                'name' => 'Pokemon: colors and crystals',
                'review' => 'que ganda jogo3 oh maninho',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'genre_id' => '3'
            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O quarto melhor titulo de sempre',
                'description' => 'O quarto melhor jogo de sempre',
                'name' => 'Street of duty: Frozen throne',
                'review' => 'que ganda jogo4 oh maninho',
                'user_id' => '3',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'genre_id' => '4'
            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O quarto melhor titulo de sempre',
                'description' => 'O quarto melhor jogo de sempre',
                'name' => 'Street of duty: Frozen throne',
                'review' => 'que ganda jogo5 oh maninho',
                'user_id' => '3',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'genre_id' => '4'
            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O quarto melhor titulo de sempre',
                'description' => 'O quarto melhor jogo de sempre',
                'name' => 'Street of duty: Frozen throne',
                'review' => 'que ganda jogo6 oh maninho',
                'user_id' => '2',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'genre_id' => '1'
            ]
        );
        \App\Game_ssj2s::create(
            [
                'title' => 'O quarto melhor titulo de sempre',
                'description' => 'O quarto melhor jogo de sempre',
                'name' => 'Street of duty: Frozen throne',
                'review' => 'que ganda jogo7 oh maninho',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'genre_id' => '1'
            ]
        );
    }
}
