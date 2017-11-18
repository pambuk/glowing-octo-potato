<?php

use Illuminate\Database\Seeder;

class FirstUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var \App\User $user */
        $user = factory(\App\User::class)->create([
            'email' => 'wojtek.zymonik@gmail.com',
            'name' => 'Wojtek',
            'password' => bcrypt(123123),
        ]);

        $user->assign(\App\Enums\UserRoles::ADMIN);
    }
}
