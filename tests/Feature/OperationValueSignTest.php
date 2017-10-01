<?php

namespace Tests\Feature;

use App\Operation;
use App\Services\OperationService;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OperationValueSignTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_store_receipt_with_minus_sign()
    {
        $_operation = factory(Operation::class)->make(['value' => 30, 'type' => Operation::TYPE_RECEIPT]);
        $operationService = new OperationService();
        $operation = $operationService->create($_operation->toArray());

        $this->assertEquals(-30, $operation->value);
    }

    /**
     * @test
     */
    public function it_should_store_expense_with_minus_sign()
    {
        $_operation = factory(Operation::class)->make(['value' => 30, 'type' => Operation::TYPE_EXPENSE]);
        $operationService = new OperationService();
        $operation = $operationService->create($_operation->toArray());

        $this->assertEquals(-30, $operation->value);
    }

    /**
     * @test
     */
    public function it_should_store_income_with_plus_sign()
    {
        $user = factory(User::class)->create();
        $operationService = new OperationService();
        $operation = $operationService->create([
            'type' => Operation::TYPE_INCOME,
            'value' => 30,
            'user_id' => $user->id,
            'operation_date' => Carbon::now(),
        ]);

        $this->assertEquals(30, $operation->value);
    }
}
