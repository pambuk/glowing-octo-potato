<?php

use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var \App\User $user */
        $user = \App\User::first();
        factory(\App\Operation::class, 10)->create(['user_id' => $user->id]);
    }
}
