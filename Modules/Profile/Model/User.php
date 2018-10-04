<?php

namespace Modules\Profile\Model;

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
     public function projects() {
        return $this->hasMany('App\Models\Project');
    }
}