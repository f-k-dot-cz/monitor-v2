<?php

namespace App\Application\ModulesHelpers;

use App\Application\Attributes\Route;

use Slim\App;

class RoutesResolver
{
    public static function resolve(App $app, string $cacheFileName = 'paths.php')
    {
        $paths = require_once MODULES_CACHE_PATH . '/' . $cacheFileName;

        foreach($paths as $classPath) {
            Route::assign($app, $classPath);
        }
    }
}
