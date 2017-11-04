<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSource extends Model
{
    const VISIBILITY_PRIVATE = 'private';
    const VISIBILITY_PUBLIC = 'public';

    protected $fillable = ['name', 'visibility', 'default_operation_type', 'owner_id'];
}
