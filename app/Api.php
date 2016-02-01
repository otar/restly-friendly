<?php

namespace RestlyFriendly;

use FlorianWolters\Component\Util\Singleton\SingletonTrait;
use League\Route\RouteCollection;
use League\Route\Strategy\RestfulStrategy;
use Symfony\Component\HttpFoundation\Request;

class Api
{

    use SingletonTrait;

    public function bootstrap()
    {

        $router = new RouteCollection;

        $routes = require __DIR__ . '/Routes.php';

        foreach ($routes AS $route)
        {

            $controllerAction = implode([
                'RestlyFriendly\Controllers\\',
                $route['controller'],
                '::',
                $route['action']
            ]);

            $strategy = (
                        isset($route['json'])
                    AND $route['json'] === FALSE
                )
                ? NULL
                : new RestfulStrategy;

            $router->addRoute(
                $route['method'],
                $route['endpoint'],
                $controllerAction,
                $strategy
            );

        }

        $request = Request::createFromGlobals();

        $router
            ->getDispatcher()
            ->dispatch(
                $request->getMethod(),
                $request->getPathInfo()
            )
            ->send();

    }



}
