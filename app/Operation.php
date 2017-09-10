<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public const TYPE_RECEIPT = 'receipt';
    public const TYPE_INCOME = 'income';
    public const TYPE_EXPENSE = 'expense';

    protected $fillable = ['user_id', 'amount', 'operation_date', 'type', 'description', 'operation_source_id', ];
    protected $dates = ['created_at', 'updated_at', 'operation_date'];

    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2, '.', '');
    }

    public function setAmountAttribute($value)
    {
        if ($this->type !== self::TYPE_INCOME && $value > 0) {
            $value *= -1;
        } else {
            $value = abs($value);
        }

        $this->attributes['amount'] = $value * 100;
    }

    public function getOperationDateAttribute($value)
    {
        return (new Carbon($value))->format('Y-m-d');
    }

    public function operationSource()
    {
        return $this->hasOne(OperationSource::class);
    }
}
