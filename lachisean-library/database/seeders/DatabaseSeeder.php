<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'photo' => 'photo/admin.png',
            'is_admin' => true,
            'email_verified_at' => now(),
            'password' => '$2y$10$fpdpOLFevNIFoIdkOjsXMuxi2MKj3LyM6fg5PI9F2.a9Jjx2BPey2',
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@email.com',
            'photo' => 'photo/user.png',
            'email_verified_at' => now(),
            'password' => '$2y$10$fpdpOLFevNIFoIdkOjsXMuxi2MKj3LyM6fg5PI9F2.a9Jjx2BPey2',
        ]);

        \App\Models\User::factory(20)->create();

        \App\Models\Category::insert([
            ['name' => 'Romance'],
            ['name' => 'Thriller'],
            ['name' => 'Horror'],
            ['name' => 'Fiction'],
            ['name' => 'Non Fiction'],
            ['name' => 'Education'],
            ['name' => 'Comic'],
        ]);

        \App\Models\Book::insert([
            [
                'title' => 'Jujutsu Kaisen',
                'author' => 'Gege Akutami',
                'description' => "Although Yuji Itadori looks like your average teenager, his immense physical strength is something to behold! Every sports club wants him to join, but Itadori would rather hang out with the school outcasts in the Occult Research Club. One day, the club manages to get their hands on a sealed cursed object. Little do they know the terror they'll unleash when they break the seal...",
                'category_id' => 7,
                'cover' => 'cover/jujutsu_kaisen.jpg',
            ],
            [
                'title' => 'Demon Slayer',
                'author' => 'Koyoharu Gotouge',
                'description' => "The setting is Taisho era Japan. Tanjirou is a kindhearted young boy who lived peacefully with his family as a coal seller. Their normal life changes completely when his family is slaughtered by demons. The only other survivor, Tanjirou's younger sister Nezuko, has become a ferocious demon. In order to return Nezuko to normal and get revenge on the demon that killed their family, the two of them depart on a journey. From a young talent, an adventure tale of blood and swords begins!",
                'category_id' => 7,
                'cover' => 'cover/demon_slayer.jpg',
            ],
            [
                'title' => 'Spy x Family',
                'author' => 'Endo Tatsuya',
                'description' => "The master spy codenamed <Twilight> has spent his days on undercover missions, all for the dream of a better world. But one day, he receives a particularly difficult new order from command. For his mission, he must form a temporary family and start a new life?! A Spy/Action/Comedy about a one-of-a-kind family!",
                'category_id' => 7,
                'cover' => 'cover/spy_x_family.jpg',
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'description' => "In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV. Sixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she steps forward to take her sister's place in the Games. But Katniss has been close to dead before—and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weight survival against humanity and life against love.",
                'category_id' => 4,
                'cover' => 'cover/the_hunger_games.jpg',
            ],
            [
                'title' => 'The Fault in Our Stars',
                'author' => 'John Green',
                'description' => "Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel's story is about to be completely rewritten.",
                'category_id' => 1,
                'cover' => 'cover/the_fault_in_our_stars.jpg',
            ],
        ]);
        \App\Models\Book::factory(20)->create();

        \App\Models\Review::factory(10)->create();
    }
}
