<?php

namespace Modules\Projects\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function scopeAsc($request) {
        return $request->orderBy('created_at', 'asc');
    }
   public function user() {
       return $this->belongsTo('App\Models\User', 'user_id', 'id');
   }
}
