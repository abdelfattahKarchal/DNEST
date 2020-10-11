<?php

use App\Image;
use App\Product;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
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

        $nbImages =(int) $this->command->ask('How many images you want to create ?', 80);

        factory(Image::class, $nbImages)->make()->each(function($image) use($products){
            $image->product_id = $products->random()->id;
            $image->save();
        });
    }
}
