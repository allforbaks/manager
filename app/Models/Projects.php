<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function scopeAsc($request) {
        return $request->orderBy('created_at', 'asc');
    }
   public function user() {
       return $this->belongsTo('App\Models\Users', 'user_id', 'id');
   }
}
