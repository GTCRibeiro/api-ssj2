<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Game::create(
            [
                'name' => 'Dark Soulerinos',
                'genre_id' => '1'

            ]
        );
        \App\Model\Game::create(
            [
                'name' => 'Poopie',
                'genre_id' => '2'

            ]
        );
        \App\Model\Game::create(
            [
                'name' => 'Shapoopie',
                'genre_id' => '3'

            ]
        );
        \App\Model\Game::create(
            [
                'name' => 'YESYESYESYESYESYESYESYESYESYESYESYESYESYES',
                'genre_id' => '4'

            ]
        );
    }
}
