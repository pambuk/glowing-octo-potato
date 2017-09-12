<?php
namespace Tests\Feature;

use App\Operation;
use App\OperationSource;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OperationShowTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_fill_all_inputs()
    {
        $user = factory(User::class)->create();
        $operationSource = factory(OperationSource::class)->create();
        /** @var Operation $operation */
        $operation = factory(Operation::class)->create([
            'user_id' => $user->id,
            'operation_source_id' => $operationSource->id,
        ]);

        $this->be($user);
        $this
            ->get(route('operations.show', ['operation' => $operation->id]))
            ->assertSee($operation->amount)
            ->assertSee($operation->description)
            ->assertSee($operation->operation_date)
            ->assertSee($operation->operationSource->name);
    }
}
