<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FirstUser::class);
        $this->call(OperationSeeder::class);
        $this->call(OperationSourceSeeder::class);
        $this->call(OperationItemSeeder::class);
    }
}
