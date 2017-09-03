<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public const TYPE_RECEIPT = 'receipt';
    public const TYPE_INCOME = 'income';
    public const TYPE_EXPENSE = 'expense';

    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = (int) $value * 100;
    }
}
