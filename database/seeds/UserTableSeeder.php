<?php

use Illuminate\Database\Seeder;
use Template\Domain\Users\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Taylor Ivanoff',
            'email' => 'taylorivanoff@gmail.com',
            'phone' => '0411 346 787',
            'password' => bcrypt('taylor123'),
            'activated' => true,
        ]);

        $user->createAsStripeCustomer();
    }
}
