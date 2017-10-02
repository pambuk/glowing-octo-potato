<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationCreate;
use App\Operation;
use App\OperationSource;
use App\Services\OperationService;
use App\Services\OperationSourceService;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now();
        if ($request->input('date')) {
            $date = Carbon::createFromFormat('Ym', $request->input('date'));
        }

        $nextMonth = $date->copy()->addMonth();
        $prevMonth = $date->copy()->subMonth();

        $operations = (new OperationService())
            ->byUser(\Auth::user())
            ->byMonth($date)
            ->get();

        return view('operations.index', compact('operations', 'nextMonth', 'prevMonth', 'date'));
    }

    public function create()
    {
        $sources = $this->getOperationSourceOptions(\Auth::user());
        return view('operations.create', ['operationSourceOptions' => $sources]);
    }

    public function store(OperationCreate $request)
    {
        $source = (new OperationSourceService())->create(\Auth::user(), [
            'default_operation_type' => $request->input('type'),
            'name' => $request->input('operation_sources_name'),
        ]);

        if (!$request->has('operation_source_id') || null === $request->input('operation_source_id')) {
            $data['operation_source_id'] = $source->id;
        } else {
            $data['operation_source_id'] = $request->input('operation_source_id');
        }

        $operation = (new OperationService())->create(array_merge($request->all(), [
            'user_id' => \Auth::user()->id,
            'description' => $request->input('description') ?: ucfirst($request->input('type')),
            'operation_source_id' => $data['operation_source_id'],
        ]));

        return redirect(route('operations.show', ['operation' => $operation->id]));
    }

    public function show(Operation $operation)
    {
        $operation->load('items');
        $sources = $this->getOperationSourceOptions(\Auth::user());

        return view('operations.create', array_merge(
            $operation->toArray(), ['operationSourceOptions' => $sources->toArray()])
        );
    }

    public function update(OperationCreate $request, Operation $operation)
    {
        $operation->fill($request->all());
        $operation->save();

        return redirect(route('operations.show', ['operation' => $operation->id]));
    }

    public function destroy(Operation $operation)
    {
        if ($operation->user_id === \Auth::user()->id) {
            $operation->delete();
        }

        return redirect(route('operations.index'));
    }

    /**
     * @param User $user
     * @return Collection
     */
    private function getOperationSourceOptions(User $user): Collection
    {
        return (new OperationSourceService())
            ->byOwner($user)
            ->get()->transform(function (OperationSource $item) {
            return [
                'value' => $item->id,
                'label' => $item->name,
            ];
        });
    }
}
