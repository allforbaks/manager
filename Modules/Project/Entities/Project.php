<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task() {
        return $this->hasMany('Modules\Project\Entities\Task');
    }
}
