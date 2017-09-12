<?php

namespace Tests\Feature;

use App\Operation;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OperationIndexTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_show_user_operations_only()
    {
        $user = factory(User::class)->create();
        $operation1 = factory(Operation::class)->create(['user_id' => $user->id]);
        $operation2 = factory(Operation::class)->create(['user_id' => $user->id]);

        $userOther = factory(User::class)->create();
        $operation3 = factory(Operation::class)->create(['user_id' => $userOther->id]);

        $this->be($user);

        $this
            ->get(route('operations.index'))
            ->assertSuccessful()
            ->assertSeeText($operation1->description)
            ->assertSeeText($operation2->description)
            ->assertDontSeeText($operation3->description);
    }
}
