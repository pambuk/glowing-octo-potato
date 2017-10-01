<?php

namespace Tests\Feature;

use App\Enums\OperationTypes;
use App\Operation;
use App\OperationItem;
use App\Services\OperationItemService;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OperationItemsSumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_update_operation_value_after_adding_operation_items()
    {
        $receipt = $this->getReceipt();

        $this->assertEquals(-30, $receipt->value);

        $itemsService = new OperationItemService();
        $itemsService->store($receipt, [
            'value' => 12.99,
            'description' => 'Test',
            'quantity' => 1,
            'volume_weight' => '1l',
        ]);

        $this->assertEquals(-12.99, $receipt->value);

        $itemsService->store($receipt, [
            'value' => 8.99,
            'description' => 'Test 2',
            'quantity' => 1,
            'volume_weight' => '300g',
        ]);

        $this->assertEquals(-21.98, $receipt->value);
    }

    /**
     * @test
     */
    public function it_should_update_operation_value_after_removing_item()
    {
        $itemsService = new OperationItemService();
        $receipt = $this->getReceipt();
        $this->assertEquals(-30, $receipt->value);

        $items = factory(OperationItem::class, 3)->make([
            'value' => 5,
        ]);

        $items->each(function (OperationItem $item) use ($receipt, $itemsService) {
            $itemsService->store($receipt, $item->toArray());
        });

        $this->assertEquals(-15, $receipt->value);

        $itemsService->destroy($receipt, $receipt->items[0]);

        $this->assertEquals(-10, $receipt->value);
    }

    /**
     * @test
     */
    public function it_should_update_operation_value_after_updating_item()
    {
        $itemsService = new OperationItemService();
        $receipt = $this->getReceipt();
        $this->assertEquals(-30, $receipt->value);

        $item = $itemsService->store(
            $receipt,
            factory(OperationItem::class)->make(['value' => 20])->toArray()
        );
        $this->assertEquals(-20, $receipt->value);

        $itemsService->update($receipt, $item, ['value' => 15]);
        $this->assertEquals(-15, $receipt->value);
    }

    private function getReceipt(int $value = 30): Operation
    {
        $user = factory(User::class)->create();

        /** @var Operation $receipt */
        $receipt = factory(Operation::class)->create([
            'user_id' => $user->id,
            'type' => OperationTypes::RECEIPT,
            'value' => $value,
        ]);

        return $receipt;
    }
}
