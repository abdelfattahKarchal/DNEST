<?php

use App\Category;
use App\Collection;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = Collection::all();
        if ($collections->count() == 0) {
            $this->command->info('Please create some collections in your collections table');
            return;
        }

        $nbCategories = (int)$this->command->ask('How many of categories you want to create ?', 10);

        factory(Category::class, $nbCategories)->make()->each(function ($category) use ($collections) {
            $category->collection_id = $collections->random()->id;
            $category->save();
        });
    }
}
