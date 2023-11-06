<?php

declare(strict_types=1);

use App\Modules\User\Actions\{ListUsersAction, ViewUserAction};
use App\Modules\Measurement\Actions\ListMeasurementAction;
use App\Application\ModulesHelpers\RoutesResolver;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    /*$app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });*/

    $app->group('/measurements', function (Group $group) {
        $group->get('', ListMeasurementAction::class);
    });

    RoutesResolver::resolve($app, 'paths.php');

    /* foreach($appendRoutes as $route) {
         if(!count($route['paths']) || !$route['path']) {
             continue;
         }

         $app->group($route['path'], function (Group $group) use ($route) {
             foreach($route['paths'] as $routeSubpath) {
                 $group->get($routeSubpath['endpoint'], $routeSubpath['actionClass']);
             }
         });
     }*/

};
