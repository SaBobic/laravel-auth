<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_ids = Category::pluck('id')->toArray();
        $users_ids = User::pluck('id')->toArray();
        $tags_ids = Tag::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $new_post = new Post();
            $new_post->title = $faker->text(50);
            $new_post->user_id = Arr::random($users_ids);
            $new_post->category_id = Arr::random($categories_ids);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->paragraphs(5, true);
            $new_post->image = $faker->imageUrl(250, 250);
            $new_post->save();

            $random_i = rand(0, count($tags_ids));
            $new_post_tags_ids = [];

            while (count($new_post_tags_ids) < $random_i) {
                $random_tag = Arr::random($tags_ids);
                if (!in_array($random_tag, $new_post_tags_ids)) {
                    $new_post_tags_ids[] = $random_tag;
                };
            }

            $new_post->tags()->attach($new_post_tags_ids);
        };
    }
}
