<?php

namespace App;

use App\Items\VolumeDisplay;
use App\Items\WeightDisplay;
use Illuminate\Database\Eloquent\Model;

/**
 * App\OperationItem
 *
 * @property int $id
 * @property int $operation_id
 * @property string $description
 * @property int $value
 * @property int $quantity
 * @property float|null $volume
 * @property int|null $weight
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $volume_weight
 * @property-read \App\Operation $operation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereOperationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationItem whereWeight($value)
 * @mixin \Eloquent
 */
class OperationItem extends Model
{
    protected $fillable = ['operation_id', 'description', 'value', 'volume', 'weight', 'quantity',];
    protected $appends = ['volume_weight'];

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_item_id');
    }

    public function getValueAttribute($value)
    {
        return number_format($value / 100, 2, '.', '');
    }

    public function setValueAttribute($value)
    {
        $value = str_replace(',', '.', $value);
        $this->attributes['value'] = (int) ($value * 100);
    }

    public function getVolumeWeightAttribute()
    {
        if (null !== $this->weight) {
            return (new WeightDisplay($this->weight))->get();
        }

        if (null !== $this->volume) {
            return (new VolumeDisplay($this->volume))->get();
        }
    }
}
