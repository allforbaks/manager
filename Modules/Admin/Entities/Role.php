<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\User;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('Modules\Admin\Entities\User', 'user_role', 'role_id', 'user_id');
    }
}
