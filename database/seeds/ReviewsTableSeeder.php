<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Review::create(
            [
                'title' => 'Será Dark Souls o melhor franchise',
                'description' => 'Dark Souls redefiniu um tipo de jogos tão famoso como RPG',
                'name' => 'Dark Souls',
                'review' => 'Dark souls is very good. I like. 10/10 would play until
                 they die. In real life of course, not ingame, or else they would stop
                  playing for 1 minute after they started the game hahahaha. BRB. Gonna watch Sekiro\'s Die Twice trailer again!!',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/gRK7B2Z.png',
                'game_id' => '1'

            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Smesh é a Ultimate Nintendo Experience!',
                'description' => 'Super Smash Bros Ultimate não trouxe nada de novo mas refinou tudo o que já tinha',
                'name' => 'Ultimate Smesh',
                'review' => 'Apesar do Super Smash Bros Ultimate não ter trazido nada de novo, conseguiu melhorar todas
                as mecânicas que tinha, e, a não esquecer, o seu modo de história ',
                'user_id' => '2',
                'image' => 'https://i.imgur.com/hrMu1bL.jpg',
                'game_id' => '1'
            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Pokemon Go, eles andam aí',
                'description' => 'Não é um pokemon como conhecemos mas não é mau',
                'name' => 'Pokemon: colors and crystals',
                'review' => 'Este novo jogo do pokemon trouxe para a mesa uma nova interação que antes não era possível.
                Neste novo jogo da Nintendo, existe uma exploração que ultrapassa o espaço virtual, passando para a realidade.
                Este jogo já me fez perder 33 Kilos! ',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/izzpeRb.jpg',
                'game_id' => '1'
            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Um mash-up de jogos inesquecível!',
                'description' => 'Com um pouco de cada género, Street of duty: Frozen Throne, não perde a essência de nenhum',
                'name' => 'Street of duty: Frozen Throne',
                'review' => 'Street of duty: Frozen Throne, a junção de Street Fighter, Call of Duty e Warcraft III: Frozen Throne
                 era uma fusão que nunca ninguém esperava que funcionasse, mas funciona, se funciona. Desde os controlos responsivos de 
                 Call of Duty, a frame data do Street Fighter e a arte do Frozen Throne. Com todos estes pormenores, o jogo consegue alcançar 
                 um novo estilo de jogo nunca antes experienciado!',
                'user_id' => '3',
                'image' => 'https://i.imgur.com/0qKO4AJ.jpg',
                'game_id' => '1'
            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Is this the head of a cup or the mug of a cup?',
                'description' => 'É um jogo hardcore mas que vale a pena pela sua arte e pela sua gameplay',
                'name' => 'Cuphead',
                'review' => 'que ganda jogo5 oh maninho',
                'user_id' => '3',
                'image' => 'https://i.imgur.com/MIdGH5S.jpg',
                'game_id' => '1'
            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Monster Hunter: World, um mundo diferente',
                'description' => 'Monster Hunter: World um bom título de entrada neste franchise',
                'name' => 'Monster Hunter: World',
                'review' => 'que ganda jogo6 oh maninho',
                'user_id' => '2',
                'image' => 'https://i.imgur.com/IRKHIxCg.jpg',
                'game_id' => '1'
            ]
        );
        \App\Model\Review::create(
            [
                'title' => 'Uma odisseia do franchise que muda tudo',
                'description' => 'Super Luigi: Odisseia no espaço vira tudo do avesso, sendo o Luigi a melhor parte',
                'name' => 'Super Luigi: Odisseia no espaço',
                'review' => 'que ganda jogo7 oh maninho',
                'user_id' => '1',
                'image' => 'https://i.imgur.com/Oner4eA.jpg',
                'game_id' => '1'
            ]
        );
    }
}
