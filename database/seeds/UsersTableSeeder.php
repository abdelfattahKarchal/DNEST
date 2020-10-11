<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbUsers = (int) $this->command->ask('how many users want you create ?',20);

        factory(User::class, $nbUsers)->create();
    }
}
