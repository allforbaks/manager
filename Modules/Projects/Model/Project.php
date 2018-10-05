<?php

namespace Modules\Projects\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * @param $request
     * @return mixed
     */
    public function scopeAsc($request) {
        return $request->orderBy('created_at', 'asc');
    }

    /**
     * @param $request
     * @param $project
     * @return mixed
     */
    public function scopeCurrentProject($request, $project)
    {
        return $request->where('id', $project->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function user() {
       return $this->belongsTo('App\Models\User', 'user_id', 'id');
   }
}
