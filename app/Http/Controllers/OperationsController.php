<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationCreate;
use App\Operation;
use App\Services\OperationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now();
        if ($request->input('date')) {
            $date = Carbon::createFromFormat('Ym', $request->input('date'));
            $nextMonth = $date->copy()->addMonth();
            $prevMonth = $date->copy()->subMonth();
        }

        $operations = (new OperationService())
            ->byUser(\Auth::user())
            ->byMonth($date)
            ->get();

        return view('operations.index', compact('operations', 'nextMonth', 'prevMonth'));
    }

    public function create()
    {
        return view('operations.create');
    }

    public function store(OperationCreate $request)
    {
        $operation = (new OperationService())->create(array_merge($request->all(), [
            'user_id' => \Auth::user()->id,
            'description' => $request->input('description') ?: ucfirst($request->input('type')),
        ]));

        return redirect(route('operations.show', ['operation' => $operation->id]));
    }

    public function show(Operation $operation)
    {
        return view('operations.create', $operation->toArray());
    }

    public function update(OperationCreate $request, Operation $operation)
    {
        $operation->fill($request->all());
        $operation->save();

        return redirect(route('operations.show', ['operation' => $operation->id]));
    }
}
