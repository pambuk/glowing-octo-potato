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
        $this->call(FirstUser::class);

        if (env('APP_ENV') === 'local') {
            $this->call(OperationSeeder::class);
            $this->call(OperationSourceSeeder::class);
            $this->call(OperationItemSeeder::class);
        }
    }
}
