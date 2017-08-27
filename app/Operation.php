<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    const TYPE_RECEIPT = 'receipt';
    const TYPE_INCOME = 'income';
    const TYPE_EXPENSE = 'expense';

    protected $fillable = ['amount', 'operation_date', 'type', 'user_id'];
    protected $dates = ['created_at', 'updated_at', 'operation_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
