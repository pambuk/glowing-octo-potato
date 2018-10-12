<?php

namespace App;

use App\Enums\OperationTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Operation
 *
 * @property int $id
 * @property int $user_id
 * @property int $value
 * @property \Carbon\Carbon $operation_date
 * @property string $type
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $operation_source_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OperationItem[] $items
 * @property-read \App\OperationSource $operationSource
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereOperationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereOperationSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Operation whereValue($value)
 * @mixin \Eloquent
 */
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
