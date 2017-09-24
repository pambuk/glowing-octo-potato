<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationItemCreate;
use App\Http\Requests\OperationItemUpdate;
use App\Items\Volume;
use App\Items\Weight;
use App\Operation;
use App\OperationItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OperationItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Operation $operation
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Operation $operation)
    {
        return view('operation-items.index', compact('operation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Operation $operation
     * @param OperationItemCreate $request
     * @return RedirectResponse
     */
    public function store(Operation $operation, OperationItemCreate $request): RedirectResponse
    {
        $item = OperationItem::make($request->validated());
        $this->addVolumeWeight($item, $request->input('volume_weight'));
        $operation->items()->save($item);

        // @todo sum items and update operation

        return redirect(route('operation-items.index', ['operation' => $operation]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Operation $operation
     * @param OperationItem $item
     * @return View
     */
    public function edit(Operation $operation, OperationItem $item): View
    {
        return view('operation-items.edit', compact('operation', 'item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Operation $operation
     * @param OperationItem $item
     * @param OperationItemUpdate $request
     * @return RedirectResponse
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Operation $operation, OperationItem $item, OperationItemUpdate $request): RedirectResponse
    {
        $item->fill($request->all());
        $this->addVolumeWeight($item, $request->input('volume_weight'));
        $item->save();

        return redirect(route('operations.show', ['operation' => $operation]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Operation $operation
     * @param OperationItem $item
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Operation $operation, OperationItem $item): RedirectResponse
    {
        /** @var OperationItem $item */
        if ($this->canBeDestroyed($operation, $item)) {
            $item->delete();
        }

        return redirect(route('operations.show', ['operation' => $operation]));
    }

    /**
     * @param Operation $operation
     * @param OperationItem $item
     * @return bool
     */
    private function canBeDestroyed(Operation $operation, OperationItem $item): bool
    {
        return $item->operation_id === $operation->id && $operation->user_id === \Auth::user()->id;
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
}
