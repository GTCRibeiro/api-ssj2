<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ArticleSsj2::create(
            [
                'title' => 'O melhor artigo de sempre',
                'description' => 'É mesmo',
                'image' => 'imagemfixe1.jpeg',
                'user_id' => '1'
            ]
        );
        \App\ArticleSsj2::create(
            [
                'title' => 'O segundo melhor artigo de sempre',
                'description' => 'É mais ou menos mesmo',
                'image' => 'imagemaisoumenos.jpeg',
                'user_id' => '2'
            ]
        );
        \App\ArticleSsj2::create(
            [
                'title' => 'O terceiro melhor artigo de sempre',
                'description' => 'É não mesmo',
                'image' => 'queimagemhorrivel.jpeg',
                'user_id' => '1'
            ]
        );
        \App\ArticleSsj2::create(
            [
                'title' => 'O quarto melhor artigo de sempre',
                'description' => 'É ainda pior mesmo',
                'image' => 'imageestupendamentecancerigena.jpeg',
                'user_id' => '3'
            ]
        );
    }
}
