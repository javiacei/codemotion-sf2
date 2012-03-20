<?php

require_once __DIR__ . '/../app/autoload.php';

use Codemotion\Controller\TaskController;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();

$routes = new RouteCollection();
$routes->add('task_list', new Route('/task/list', array(
    'controller' => '\Codemotion\Controller\TaskController',
    'action' => 'listAction'
)));
$routes->add('task_show', new Route('/task/{name}/show', array(
    'controller' => '\Codemotion\Controller\TaskController',
    'action' => 'showAction'
)));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($request->getPathInfo());

$controller = new $parameters['controller'];
$action     = $parameters['action'];

/* Introducimos los parametros de la ruta en los atributos del objeto request */
$request->attributes->add($parameters);

$response = $controller->$action($request);

/* Enviamos el contenido */
$response->prepare($request);
$response->send();
