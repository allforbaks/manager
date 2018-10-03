<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function scopeUserId() {
        return auth()->user()->id;
    }

    public function scopeGetCurrentUser($query) {
        return $query->where('id', Users::userid())->get();
    }

    public function projects() {
        return $this->hasMany('App\Models\Projects');
    }
}