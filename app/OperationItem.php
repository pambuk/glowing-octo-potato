<?php

namespace App;

use App\Items\VolumeDisplay;
use App\Items\WeightDisplay;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['value'] = $value * 100;
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
