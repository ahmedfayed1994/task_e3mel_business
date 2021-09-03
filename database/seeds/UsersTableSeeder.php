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
        $usersCount = (int)$this->command->ask('How many users would you like?', 20);

        factory(User::class)->state('Admin')->create();
        factory(User::class, $usersCount)->create();

    }
}
