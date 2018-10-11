<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Project\Entities\Project;
use Modules\Admin\Entities\Role;


class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'images'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function project() {
        return $this->hasMany(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}