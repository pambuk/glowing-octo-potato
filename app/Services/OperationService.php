<?php

namespace App\Services;


use App\Operation;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OperationService
{
    /** @var \Illuminate\Database\Eloquent\Builder $query */
    private $query;

    public function __construct()
    {
        $this->query = Operation::query();
    }

    public function get()
    {
        return $this->query->get();
    }

    public function byUser(User $user) : self
    {
        $this->query->where('user_id', $user->id);

        return $this;
    }

    public function byMonth(Carbon $date)
    {
        $firstDay = $date->copy()->firstOfMonth();
        $lastDay = $date->copy()->lastOfMonth();

        $this->query->whereBetween('operation_date', [$firstDay, $lastDay]);

        return $this;
    }

    public function create($data)
    {
        $operation = new Operation();
        $operation->fill($data);
//        $operation->user_id = \Auth::user()->id;
//        $operation->description = $request->input('description') ?: ucfirst($request->input('type'));
        $operation->save();

        return $operation;
    }
}