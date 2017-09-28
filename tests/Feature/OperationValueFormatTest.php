<?php

namespace Tests\Feature;

use App\Operation;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OperationValueFormatTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /**
     * @test
     */
    public function it_should_store_value_given_with_comma()
    {
        $user = factory(User::class)->create();
        $operation = factory(Operation::class)->make([
            'user_id' => $user->id, 'value' => '12,50', 'type' => Operation::TYPE_RECEIPT,
        ]);

        $this->be($user);
        $this
            ->post(route('operations.create'), $operation->toArray())
            ->assertRedirect();

        $operation = Operation::all()->first();

        $this->assertEquals(-12.50, $operation->value);
    }
}
