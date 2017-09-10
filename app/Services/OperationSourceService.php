<?php
namespace App\Services;

use App\OperationSource;

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
}