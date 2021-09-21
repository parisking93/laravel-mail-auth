<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Java','CSS','Php','Python','Html','Javascript'];

        foreach($categories as $category) {
            
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, '-');

            $newCategory->save();
        }
    }
}
