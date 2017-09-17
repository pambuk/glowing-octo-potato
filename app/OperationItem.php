<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationItem extends Model
{
    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_item_id');
    }
}
