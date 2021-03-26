<?php

declare(strict_types=1);

require_once(__DIR__.'/../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Controller\Hello;
use App\Controller\Faq;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$request = Request::createFromGlobals();

$HelloRoute = new Route('/hello/{prenom}', ['_controller'=>Hello::class]);
$FaqRoute = new Route('/faq', ['_controller'=>Faq::class]);

$routeCollection = new RouteCollection();
$routeCollection->add('hello', $HelloRoute);
$routeCollection->add('faq', $FaqRoute);

$context = new RequestContext('/');
$urlMatcher = new UrlMatcher($routeCollection, $context);

$parameters = $urlMatcher->match($request->getPathInfo());
['_controller' => $controller, '_route' => $route] = $parameters;
unset(
    $parameters['_controller'],
    $parameters['_route']
);

try {
    $controller = new $controller;
    $response = $controller($request,...$parameters);
} catch (Exception $exception) {
    $response = new Response('404');
}

$response->send();
