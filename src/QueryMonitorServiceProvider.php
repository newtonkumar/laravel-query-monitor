<?php

use Illuminate\Support\Facades\DB;
use QueryMonitor\Listeners\QueryListener;
use Illuminate\Support\ServiceProvider;

class QueryMonitorServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if (!config('query-monitor.enabled')) {
            return;
        }

        DB::listen(function ($query) {
            (new QueryListener())->handle($query);
        });

    }

}
