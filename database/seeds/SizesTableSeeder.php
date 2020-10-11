<?php

use App\Product;
use App\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        if($products->count() == 0){
            $this->command->info('Please create some product in your products table');
            return;
        }

        $nbSizes =(int) $this->command->ask('How many sizes you want to create ?', 200);

        factory(Size::class,$nbSizes)->make()->each(function($size) use($products){
            $size->product_id = $products->random()->id;
            $size->save();
        });
    }
}
