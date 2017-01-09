<?php

namespace App\Http\ViewComposers;
use App\Models\Metrics;
use Illuminate\View\View;

class MetricsComposer
{
    public function compose(View $view)
    {
        $view->with('metrics', Metrics::getActive());
    }
}