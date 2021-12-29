<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         /* $this->call(CollectionsTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(SubCategoriesTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(ImagesTableSeeder::class);
         $this->call(SizesTableSeeder::class);
         $this->call(ReviewsTableSeeder::class); */
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
