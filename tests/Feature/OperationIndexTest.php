<?php

namespace Tests\Feature;

use App\Operation;
use App\Services\OperationService;
use App\User;
use Carbon\Carbon;
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
        $date = Carbon::now();
        $user = factory(User::class)->create();
        $operation1 = factory(Operation::class)->create(['user_id' => $user->id]);
        $operation2 = factory(Operation::class)->create(['user_id' => $user->id]);

        $userOther = factory(User::class)->create();
        $operation3 = factory(Operation::class)->create(['user_id' => $userOther->id]);

        $this->be($user);

        $operations = (new OperationService())
            ->byUser(\Auth::user())
            ->byMonth($date)
            ->get();

        $this->assertTrue($operations->contains($operation1));
        $this->assertTrue($operations->contains($operation2));
        $this->assertFalse($operations->contains($operation3));
        $this->assertEquals(2, $operations->count());
    }
}
