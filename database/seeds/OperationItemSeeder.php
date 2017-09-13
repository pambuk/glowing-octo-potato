<?php

use Illuminate\Database\Seeder;

class OperationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Operation::all()->each(function (\App\Operation $item) {
            factory(\App\OperationItem::class, 10)->create(['operation_id' => $item->id]);
        });
    }
}
