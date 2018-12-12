<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Genre::create(
            [
                'name' => 'RPG',
            ]
        );
        \App\Genre::create(
            [
                'name' => 'Fighting game',
            ]
        );
        \App\Genre::create(
            [
                'name' => 'ShootBrawl&SomethingElse',
            ]
        );
        \App\Genre::create(
            [
                'name' => 'Shooter',
            ]
        );
    }
}
