<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // app/Http/Controllers/Controller.php
    protected function logActivity($action, $details)
    {
        $userName = \Auth::check() ? \Auth::user()->name : 'Khách';
        $log = "[" . now() . "] " . $userName . " - " . $action . " - " . $details . "\n";
        \File::append(storage_path('logs/activities.log'), $log);
    }
}
