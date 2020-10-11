<?php

use App\Product;
use App\SubCategory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = SubCategory::all();

        if($subCategories->count() == 0){
            $this->command->info('Please create some sub Categories in your sub_categories table');
            return;
        }

        $nbProducts = (int) $this->command->ask('how many product you want to create ?', 80);

        factory(Product::class, $nbProducts)->make()->each(function($product) use($subCategories){
        $product->sub_category_id = $subCategories->random()->id;
        $product->save();
        });
    }
}
