<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('Module\Projects\Model\Project');
    }
}