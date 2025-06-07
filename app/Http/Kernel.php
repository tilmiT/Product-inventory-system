<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // ... other middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // ... other middleware
        ],
        'api' => [
            // ... other middleware
        ],
    ];

    protected $routeMiddleware = [
        // ... other middleware
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
?>