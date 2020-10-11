<?php

use App\Product;
use App\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
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

        $nbReviews =(int) $this->command->ask('How many reviews you want to create ?', 300);

        factory(Review::class,$nbReviews)->make()->each(function($review) use($products){
            $review->product_id = $products->random()->id;
            $review->save();
        });
    }
}
