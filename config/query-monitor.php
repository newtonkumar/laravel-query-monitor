<?php

return [

    'enabled' => env('QUERY_MONITOR_ENABLED', true),

    'slow_query_threshold' => env('SLOW_QUERY_THRESHOLD', 200),

    'store_queries' => true,

    'alert_threshold' => 1000,

    'sample_rate' => 1.0,

];