<?php

use App\Category;
use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        if ($categories->count() == 0) {
            $this->command->info('Please create some categories in your categories table');
            return;
        }

        $nbSubCategories = (int) $this->command->ask('How many sub categories you want to create ?',20);

        factory(SubCategory::class, $nbSubCategories)->make()->each(function($subCategory) use($categories){
            $subCategory->category_id = $categories->random()->id;
            $subCategory->save();
        });
    }
}
