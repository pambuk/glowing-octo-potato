<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationItem extends Model
{
    protected $fillable = ['operation_id', 'description', 'value', 'volume', 'weight', 'quantity',];

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_item_id');
    }
}
