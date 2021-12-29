<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbRoles = (int) $this->command->ask('how many roles want you create ?',20);

        factory(Role::class, $nbRoles)->create();
    }
}
