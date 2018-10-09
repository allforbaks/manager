<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'value', 'name', 'email'];

    protected $table = 'history_payments';
}
