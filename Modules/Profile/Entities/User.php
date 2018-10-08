<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Project\Entities\Project;


class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'images'];

    /**
     * @param $request
     * @param $user
     * @return mixed
     */
    public function scopeCurrentUser($request, $user)
    {
        return $request->where('id', $user->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function project() {
        return $this->hasMany(Project::class);
    }
}