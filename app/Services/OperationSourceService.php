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

    public function create(User $user, $data)
    {
        OperationSource::create(array_merge([
            'owner_id' => $user->id,
        ], $data));
    }
}