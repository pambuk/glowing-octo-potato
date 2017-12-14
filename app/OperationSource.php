<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OperationSource
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $visibility
 * @property string|null $default_operation_type
 * @property int|null $owner_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereDefaultOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationSource whereVisibility($value)
 * @mixin \Eloquent
 */
class OperationSource extends Model
{
    const VISIBILITY_PRIVATE = 'private';
    const VISIBILITY_PUBLIC = 'public';

    protected $fillable = ['name', 'visibility', 'default_operation_type', 'owner_id'];
}
