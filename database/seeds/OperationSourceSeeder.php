<?php

use App\OperationSource;
use Illuminate\Database\Seeder;

class OperationSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(OperationSource::class, 3)->create();
    }
}
