<?php

namespace App\Services;

use App\Operation;
use App\User;
use Carbon\Carbon;

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

    public function create($data): Operation
    {
        $operation = new Operation();
        $operation->fill($data);
        $operation->save();

        return $operation;
    }
}