<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
