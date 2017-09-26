<?php
namespace App\Services;

use App\Items\Volume;
use App\Items\Weight;
use App\Operation;
use App\OperationItem;

class OperationItemService
{
    /** @var \Illuminate\Database\Eloquent\Builder $query */
    private $query;

    public function __construct()
    {
        $this->query = OperationItem::query();
    }

    public function get()
    {
        return $this->query->get();
    }

    public function store(Operation $operation, $data): OperationItem
    {
        $item = OperationItem::make($data);
        return $this->save($operation, $item, $data);
    }

    public function update(Operation $operation, OperationItem $item, $data): OperationItem
    {
        $item->fill($data);
        return $this->save($operation, $item, $data);
    }

    public function destroy(Operation $operation, OperationItem $item): bool
    {
        $item->delete();
        $operation->load('items');
        $operation->value = $operation->items->sum('value');
        return $operation->save();
    }

    private function addVolumeWeight(OperationItem $item, ?string $input): void
    {
        if (null !== $input) {
            $weight = new Weight($input);
            if ($weight->isValid()) {
                $item->weight = $weight->get();
            }

            $volume = new Volume($input);
            if ($volume->isValid()) {
                $item->volume = $volume->get();
            }
        }
    }

    /**
     * @param Operation $operation
     * @param OperationItem $item
     * @param $data
     * @return OperationItem
     */
    private function save(Operation $operation, OperationItem $item, $data): OperationItem
    {
        if (isset($data['volume_weight'])) {
            $this->addVolumeWeight($item, $data['volume_weight']);
        }

        $operation->items()->save($item);
        $operation->load('items');

        // update operation
        $operation->value = $operation->items->sum('value');
        $operation->save();

        return $item;
    }
}