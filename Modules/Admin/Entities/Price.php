<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['project', 'task', '_token'];

    public function scopeGetPrice($request)
    {
        return $request->where('id', 1);
    }
}
