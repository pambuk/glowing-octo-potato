<?php

namespace App;

use App\Enums\OperationTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['user_id', 'value', 'operation_date', 'type', 'description', 'operation_source_id', ];
    protected $dates = ['created_at', 'updated_at', 'operation_date'];

    public function getValueAttribute($value)
    {
        return number_format($value / 100, 2, '.', '');
    }

    public function setValueAttribute($value)
    {
        $value = str_replace(',', '.', $value);

        if ($this->type === OperationTypes::INCOME && $value < 0) {
            $value = abs($value);
        } elseif ($this->type !== OperationTypes::INCOME && $value > 0) {
            $value *= -1;
        }

        $this->attributes['value'] = (int) ($value * 100);
    }

    public function getOperationDateAttribute($value)
    {
        return (new Carbon($value))->format('Y-m-d');
    }

    public function operationSource()
    {
        return $this->hasOne(OperationSource::class, 'id');
    }

    public function items()
    {
        return $this->hasMany(OperationItem::class);
    }
}
