<?php

namespace Tests\Feature;

use App\Enums\OperationTypes;
use App\Http\Middleware\VerifyCsrfToken;
use App\Operation;
use App\OperationItem;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OperationItemValueFormatTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_store_value_given_with_coma()
    {
        $user = factory(User::class)->create();
        $operation = factory(Operation::class)->create([
            'user_id' => $user->id,
            'value' => 30,
            'type' => OperationTypes::RECEIPT,
        ]);
        $item = factory(OperationItem::class)->make(['value' => '12,50']);

        $this->be($user);
        $this
            ->withoutMiddleware(VerifyCsrfToken::class)
            ->post(
                route('operation-items.store', ['operation' => $operation]),
                $item->toArray() + ['operation_id' => $operation->id]
            )
            ->assertRedirect(route('operation-items.index', ['operation' => $operation]));

        $operation = Operation::all()->first();

        $this->assertEquals(-12.50, $operation->value);
        $this->assertEquals(12.50, $operation->items->first()->value);
    }
}
