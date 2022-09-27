<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_post = new Post();
            $new_post->title = $faker->text(50);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->paragraphs(5, true);
            $new_post->image = $faker->imageUrl(250, 250);
            $new_post->save();
        };
    }
}