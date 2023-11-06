<?php

declare(strict_types=1);

namespace App\Application\Attributes;

use Slim\App;

#[\Attribute(\Attribute::TARGET_ALL)]
class Route
{
    public const GET = 'get';
    public const POST = 'post';
    public const PUT = 'put';
    public const DELETE = 'delete';

    public const PARAM_PATH = 'path';
    public const PARAM_HEADER = 'header';
    public const PARAM_METHOD = 'method';

    public $params;

    /**
     * Definitions within the Route attribute
     *
     * First param:
     * - path | config array
     *
     * Second param:
     * - method | config array
     *
     * Third param:
     * - config array | none
     */
    public function __construct()
    {
        $args = func_get_args();
        $argsFinal = [];
        if(is_string($args[0])) {
            $argsFinal[self::PARAM_PATH] = $args[0];
        } else {
            $argsFinal = $args;
        }

        if(isset($args[1]) && is_string($args[1])) {
            $argsFinal[self::PARAM_METHOD] = $args[1];
        } elseif(isset($args[1]) && is_array($args[1])) {
            $argsFinal = array_merge($argsFinal, $args[1]);
        } else {
            $argsFinal[self::PARAM_METHOD] = self::GET;
        }

        if(isset($args[2]) && is_array($args[2])) {
            $argsFinal = array_merge($argsFinal, $args[2]);
        }

        $this->params = $argsFinal;
    }

    /**
     * Assign route to app
     *
     * @param App|null $app
     * @param [type] $target
     * @return void
     */
    private function _assign(App $app = null, $target = null)
    {
        $method = $this->params[self::PARAM_METHOD];
        $path = $this->params[self::PARAM_PATH];
        $app->{$method}($path, $target);

        return [$path => [$target, $this->params]];
    }

    public static function assign(App $app, $routeClass)
    {
        $reflection = new \ReflectionClass($routeClass);
        $routes = $reflection->getAttributes(Route::class);

        if(!count($routes)) {
            return false;
        }

        $route = $routes[0];
        $routeInstance = $route->newInstance();
        return $routeInstance->_assign($app, $routeClass);
    }

}
