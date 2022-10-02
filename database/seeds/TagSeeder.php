<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = config('tags');
        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->label = $tag['label'];
            $new_tag->color = $tag['color'];
            $new_tag->color_name = $tag['color_name'];
            $new_tag->save();
        }
    }
}
