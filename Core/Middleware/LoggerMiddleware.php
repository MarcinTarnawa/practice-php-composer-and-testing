<?php

namespace Core\Middleware;

class LoggerMiddleware
{
    public function handle()
    {   
        $loggerMiddleware = "active";
        $GLOBALS['loggerMiddleware'] = $loggerMiddleware;
        return $loggerMiddleware;
    }
}