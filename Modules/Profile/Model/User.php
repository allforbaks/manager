<?php

namespace Modules\Profile\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function scopeUserId() {
        return auth()->user()->id;
    }

    public function scopeGetCurrentUser($query) {
        return $query->where('id', User::userid())->get();
    }

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }
}