<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create(
            [
                'name' => 'Gonçalo',
                'email' => 'goncalotribeiro@ua.pt',
                'password' => bcrypt( 'passwordQueNosQuisermos')
            ]
        );
        \App\User::create(
            [
                'name' => 'Gustavo',
                'email' => 'gustavotribeiro@ua.pt',
                'password' => bcrypt( 'passwordQueNosQuisermos')
            ]
        );
        \App\User::create(
            [
                'name' => 'Guilherme',
                'email' => 'guilhermetribeiro@ua.pt',
                'password' => bcrypt( 'passwordQueNosQuisermos')
            ]
        );

    }
}
