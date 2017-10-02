<?php
namespace App\Services;

use App\OperationSource;
use App\User;

class OperationSourceService
{
    /** @var \Illuminate\Database\Eloquent\Builder $query */
    private $query;

    public function __construct()
    {
        $this->query = OperationSource::query();
    }

    public function get()
    {
        return $this->query->get();
    }

    public function create(User $user, $data): OperationSource
    {
        $source = new OperationSource();
        $source->name = $data['name'];
        $source->default_operation_type = $data['default_operation_type'];
        $source->owner_id = $user->id;
        $source->save();

        return $source;
    }

    public function byOwner(User $user)
    {
        $this->query->where('owner_id', $user->id);
        return $this;
    }
}