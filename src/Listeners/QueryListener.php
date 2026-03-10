<?php

namespace QueryMonitor\Listeners;

use QueryMonitor\Services\QueryAnalyzer;

class QueryListener
{
    public function handle($query)
    {
        QueryAnalyzer::analyze($query);
    }
}