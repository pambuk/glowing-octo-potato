<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Account
 *
 * @property int $id
 * @property string $name
 * @property int $owner_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Account whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Account extends Model
{
    protected $fillable = ['name', 'owner_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
