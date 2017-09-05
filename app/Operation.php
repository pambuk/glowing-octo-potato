<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public const TYPE_RECEIPT = 'receipt';
    public const TYPE_INCOME = 'income';
    public const TYPE_EXPENSE = 'expense';

    protected $fillable = ['user_id', 'amount', 'operation_date', 'type', 'description', ];

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

        $this->attributes['amount'] = (int) ($value * 100);
    }
}
