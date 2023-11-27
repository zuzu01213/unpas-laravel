<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
use App\models\Category;
use App\models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         user::create ([
            'name' => 'Keenan Rahmanda',
            'username' => 'Keenan123',
            'email' => 'kener123@gmail.com',
            'password' => bcrypt('12345')
         ]);

        //  user::create ([
        //     'name' => 'Sandhika Galih',
        //     'email' => 'sandikagalih@gmail.com',
        //     'password' => bcrypt('12345')
        //  ]);
        User::factory(12)->create();

         Category::create([
            'name' => 'World',
            'slug' => 'world',
         ]);

         Category::create([
            'name' => 'Indoneisa',
            'slug' => 'indoneisa',
         ]);

         Category::create([
            'name' => 'Culture',
            'slug' => 'culture',
         ]);


         Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
         ]);

         Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
         ]);

         Category::create([
            'name' => 'Business',
            'slug' => 'business',
         ]);

         Category::create([
            'name' => 'Politics',
            'slug' => 'politics',
         ]);

         Category::create([
            'name' => 'Science',
            'slug' => 'science',
         ]);

         Category::create([
            'name' => 'Health',
            'slug' => 'health',
         ]);

         Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
         ]);

         Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
         ]);
         Category::create([
            'name' => 'Food',
            'slug' => 'food',
         ]);


            Post::factory(66)->create();

        //  Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reiciendis rerum error ex eum reprehenderit sint hic voluptate voluptas corporis fugiat ratione, provident soluta! Sit a laboriosam ipsa ullam pariatur consequuntur dicta quae excepturi amet. Quas itaque officiis nam earum possimus quibusdam nemo laboriosam porro excepturi expedita, minus temporibus dolor voluptatum dolores voluptatem esse maxime perferendis, voluptates in? Corrupti possimus quibusdam iusto exercitationem suscipit tempora ipsa explicabo quo veniam iure corporis, nihil libero mollitia distinctio. Tempora, beatae facilis aliquid reprehenderit a error ea dolorum quas magni nisi expedita unde quibusdam iste est earum iusto explicabo fugiat cupiditate dolores voluptas itaque!',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //  ]);

        //  Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reiciendis rerum error ex eum reprehenderit sint hic voluptate voluptas corporis fugiat ratione, provident soluta! Sit a laboriosam ipsa ullam pariatur consequuntur dicta quae excepturi amet. Quas itaque officiis nam earum possimus quibusdam nemo laboriosam porro excepturi expedita, minus temporibus dolor voluptatum dolores voluptatem esse maxime perferendis, voluptates in? Corrupti possimus quibusdam iusto exercitationem suscipit tempora ipsa explicabo quo veniam iure corporis, nihil libero mollitia distinctio. Tempora, beatae facilis aliquid reprehenderit a error ea dolorum quas magni nisi expedita unde quibusdam iste est earum iusto explicabo fugiat cupiditate dolores voluptas itaque!',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //  ]);

        //  Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reiciendis rerum error ex eum reprehenderit sint hic voluptate voluptas corporis fugiat ratione, provident soluta! Sit a laboriosam ipsa ullam pariatur consequuntur dicta quae excepturi amet. Quas itaque officiis nam earum possimus quibusdam nemo laboriosam porro excepturi expedita, minus temporibus dolor voluptatum dolores voluptatem esse maxime perferendis, voluptates in? Corrupti possimus quibusdam iusto exercitationem suscipit tempora ipsa explicabo quo veniam iure corporis, nihil libero mollitia distinctio. Tempora, beatae facilis aliquid reprehenderit a error ea dolorum quas magni nisi expedita unde quibusdam iste est earum iusto explicabo fugiat cupiditate dolores voluptas itaque!',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //  ]);

        //  Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reiciendis rerum error ex eum reprehenderit sint hic voluptate voluptas corporis fugiat ratione, provident soluta! Sit a laboriosam ipsa ullam pariatur consequuntur dicta quae excepturi amet. Quas itaque officiis nam earum possimus quibusdam nemo laboriosam porro excepturi expedita, minus temporibus dolor voluptatum dolores voluptatem esse maxime perferendis, voluptates in? Corrupti possimus quibusdam iusto exercitationem suscipit tempora ipsa explicabo quo veniam iure corporis, nihil libero mollitia distinctio. Tempora, beatae facilis aliquid reprehenderit a error ea dolorum quas magni nisi expedita unde quibusdam iste est earum iusto explicabo fugiat cupiditate dolores voluptas itaque!',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //  ]);
    }
}
