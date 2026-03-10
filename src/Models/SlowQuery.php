<?php

namespace QueryMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class SlowQuery extends Model
{
    protected $guarded = [];

    protected $casts = [
        'bindings' => 'array',
        'executed_at' => 'datetime'
    ];
}