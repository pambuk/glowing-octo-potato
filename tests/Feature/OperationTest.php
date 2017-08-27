<?php

namespace Tests\Feature;

use App\Operation;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OperationTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /**
     * @test
     */
    public function it_should_add_receipt()
    {
        $user = factory(User::class)->create();
        $operation = factory(Operation::class)
            ->make(['user_id' => $user->id, 'type' => Operation::TYPE_RECEIPT]);

        $this->be($user);
        $this
            ->post(route('operations.store'), $operation->toArray())
            ->assertRedirect(route('operations.index'));

        $this->assertDatabaseHas('operations', ['user_id' => $user->id, 'type' => Operation::TYPE_RECEIPT]);
    }

    /**
     * @test
     */
    public function it_should_update_amount()
    {
        $user = factory(User::class)->create();
        $operation = factory(Operation::class)
            ->create(['user_id' => $user->id, 'type' => Operation::TYPE_RECEIPT, 'amount' => 100]);

        $this->be($user);
        $this
            ->put(route('operations.update', ['operation' => $operation->id]), ['amount' => 120]);

        $this->assertDatabaseHas('operations', ['id' => $operation->id, 'amount' => 120]);
    }
}
