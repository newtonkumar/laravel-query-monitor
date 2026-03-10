<?php

namespace QueryMonitor\Services;

use QueryMonitor\Models\SlowQuery;
use Illuminate\Support\Facades\Route;

class QueryAnalyzer
{
    public static function analyze($query)
    {
        $threshold = config('query-monitor.slow_query_threshold');

        if ($query->time < $threshold) {
            return;
        }

        $fingerprint = md5($query->sql);

        SlowQuery::create([
            'sql' => $query->sql,
            'bindings' => $query->bindings,
            'time_ms' => $query->time,
            'connection' => $query->connectionName,
            'route' => optional(Route::current())->uri(),
            'fingerprint' => $fingerprint,
            'executed_at' => now(),
        ]);
    }
}