<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Project\Entities\Project;


class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'images'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function project() {
        return $this->hasMany(Project::class);
    }
}