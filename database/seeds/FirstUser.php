<?php

use Illuminate\Database\Seeder;

class FirstUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'email' => 'wojtek.zymonik@gmail.com',
            'name' => 'Wojtek',
            'password' => 123123,
        ]);
    }
}
