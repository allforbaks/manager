<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'urgency', 'start_at', 'finish_at', 'title', 'description',];

    public function project() {
        return $this->belongsTo('Modules\Project\Entities\Project');
    }
}
