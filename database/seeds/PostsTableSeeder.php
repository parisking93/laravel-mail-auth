<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
// connetto il model 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 50; $i++){
            $newPost = new Post();

            $newPost->title = "Post number" . ($i + 1);
            // creo lo slug e lo prendo dal titolo e uso la slug 
            $newPost->slug = Str::slug($newPost->title, '-'); 
            $newPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia distinctio velit ab, qui sint cumque! A quam esse iste perferendis. Nihil, totam saepe, expedita ipsa dolorum perferendis delectus repudiandae sapiente dolor dignissimos quibusdam blanditiis ea? Impedit exercitationem, nesciunt, et tenetur ducimus culpa dolorum, praesentium blanditiis perferendis mollitia enim voluptatum possimus?";
            
            $newPost->save();
        }
    }
}
