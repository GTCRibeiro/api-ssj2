<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Genre::create(
            [
                'name' => 'RPG',
            ]
        );
        \App\Model\Genre::create(
            [
                'name' => 'Fighting game',
            ]
        );
        \App\Model\Genre::create(
            [
                'name' => 'ShootBrawl&SomethingElse',
            ]
        );
        \App\Model\Genre::create(
            [
                'name' => 'Shooter',
            ]
        );
    }
}
