<?php

namespace QueryMonitor\Alerts;

use Illuminate\Support\Facades\Notification;

class SlowQueryNotifier
{

    public static function send($query)
    {
        if ($query->time < config('query-monitor.alert_threshold')) {
            return;
        }

        Notification::route('slack', config('services.slack.webhook'))
            ->notify(new SlowQueryNotification($query));
    }

}